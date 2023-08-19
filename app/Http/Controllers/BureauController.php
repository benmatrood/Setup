<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Bookings;
use App\Models\Houses;
use App\Models\Companies;
use App\Models\Orders;
use App\Models\Restorants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class BureauController extends Controller
{
    //Afficher le dashboard du bureau
    public function index()
    {
        return inertia('Bureau/Index');
    }
    // Afficher la liste des users
    public function userListe()
    {
        //Récupérer la liste des users avec les diffrents relations
        $users_liste = User::with(["r_user_role", "r_user_restorant", "r_user_companie"])->get();
        return inertia('Bureau/UserListe', ['users_liste' => $users_liste]);
    }

    // Afficher la liste des restaurants avec les filtres et pagination
    public function restoListe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_data' => 'nullable|string',
            'filtre_status' => 'nullable|string',
            'per_page' => 'nullable|integer|min:1',
        ]);
        $search = $request->search_data;
        $filtre_status = $request->filtre_status;
        $per_page = $request->per_page ?? 10;
        $query = Restorants::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where("name", "like", "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        if ($filtre_status) {
            $query->where("restorant_status", $filtre_status);
        }
        $restorants_liste = $query->latest()->paginate($per_page);
        return inertia('Bureau/Parteners/RestorantListe', [
            'restorants_liste' => $restorants_liste,
            'filtres' => $request->only("search_data", "filtre_type", "filtre_status", "per_page")
        ]);
    }

    // Afficher la liste des partenaires(Hotels & Résidences) avec les filtres et pagination
    public function hotelListe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_data' => 'nullable|string',
            'filtre_type' => 'nullable|string',
            'per_page' => 'nullable|integer|min:1',
        ]);
        //mise en place des messages d'erreur
        if ($validator->fails()) {
            return back()->withErrors([
                'error' => "données incorrectes",
            ]);
        }
        $search = $request->search_data;
        $filtre = $request->filtre_type;
        $filtre_status = $request->filtre_status;
        $per_page = $request->per_page ?? 10;
        $query = Companies::query();
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where("name", "like", "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }
        if ($filtre) {
            $query->where("company_type", $filtre);
        }
        if ($filtre_status) {
            $query->where("company_status", $filtre_status);
        }
        $hotelListe = $query->latest()->paginate($per_page);
        return inertia('Bureau/Parteners/HotelListe', [
            'hotelListe' => $hotelListe,
            'filtres' => $request->only("search_data", "filtre_type", "filtre_status", "per_page")
        ]);
    }
    // Afficher la liste des réservation(Hotels & Résidences) avec les filtres et pagination
    public function reservationListe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search_data' => 'nullable|string',
            'filtre_type' => 'nullable|string',
            'filtre_status' => 'nullable|string',
            'per_page' => 'nullable|integer|min:1',
        ]);
        //mise en place des messages d'erreur
        if ($validator->fails()) {
            return back()->withErrors([
                'error' => "données incorrectes",
            ]);
        }
        $search = $request->input('search_data');
        $filtre = $request->input('filtre_type');
        $filtre_status = $request->input('filtre_status');
        $per_page = $request->input('per_page', 10);
        $query = Bookings::with(["r_booking_user", "r_booking_houses"]);
        if ($search) {
            $query_user = User::query();
            $query_user->where(function ($q) use ($search) {
                $q->where("first_name", "like", "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('phone_number', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
            $query_id = $query_user->get()->toArray();
            $ids = []; // Tableau pour stocker les IDs
            foreach ($query_id as $item) {
                if (isset($item['id'])) {
                    $ids[] = $item['id'];
                }
            }
            $query->whereIn("user_id", $ids)->get();
        }
        if ($filtre) {
            $query_house = Houses::query();
            $query_house->where(function ($q) use ($filtre) {
                $q->where("housecategory_id", "like", "%{$filtre}%");
            });
            $query_id = $query_house->get()->toArray();
            $ids = []; // Tableau pour stocker les IDs
            foreach ($query_id as $item) {
                if (isset($item['id'])) {
                    $ids[] = $item['id'];
                }
            }
            $query->whereIn("house_id", $ids)->get();
        }
        if ($filtre_status) {
            $query->where("booking_status", $filtre_status);
        }
        $booking_liste = $query->latest()->paginate($per_page);
        $companie_data = Companies::All();
        return inertia('Bureau/OrdersReservations/ReservationListe', [
            'booking_liste' => $booking_liste,
            'companie_data' => $companie_data,
            'filtres' => $request->only("search_data", "filtre_type", "filtre_status", "per_page")
        ]);
    }
    //
    public function commandeListe()
    {
        //Récupérer la liste des users avec les diffrents relations
        $reservation_liste = Orders::with(["r_booking_user", "r_booking_houses"])->get();
        return inertia('Bureau/OrdersReservations/OrderListe', ['booking_liste' => $reservation_liste]);
    }
}

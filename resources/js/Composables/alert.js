// Les composibles sont de petit composant qu'on esport et réutiulise
// partous ds le projet on met généralement use anvt le non de la fonction

// fonction de message de success
export function useSwalSuccess(messsage) {
    Swal.fire({
        toast: true,
        icon: "success",
        // title: messsage,
        text: messsage,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });
}

// function de massage d'erreur
export function useSwalError(messsage) {
    Swal.fire({
        toast: true,
        icon: "error",
        title: messsage,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });
}



import sweet from 'sweetalert2';

window.Swal = sweet;

const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

document.addEventListener('livewire:load', function () {

    Livewire.on('success', message => {
        Toast.fire({
        icon: 'success',
        title: message,
        });
    });


    Livewire.on('static-success', msj => {
        Swal.fire({
            icon: 'success',
            title: 'Acción exiotosa',
            text: msj,
        });
    });

    Livewire.on('error', msj => {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: msj,
        });
    });

    Livewire.on('alert', msj => {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: msj,
        });
    });
});





import './bootstrap';
import Swal from 'sweetalert2';

document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.getElementById('logout-btn');
    const logoutForm = document.getElementById('logout-form');
    const saveprofileChangesBtn = document.getElementById('save-profile-changes-btn');


    if (logoutBtn && logoutForm) {
        logoutBtn.addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You will be logged out.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EA9087',
                cancelButtonColor: '#8497B5',
                confirmButtonText: 'Yes, logout'
            }).then((result) => {
                if (result.isConfirmed) {
                    logoutForm.submit();
                }
            });
        });
    }

    document.querySelectorAll('.removecart-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Remove item?',
                text: "Are you sure you want to remove this product from the cart?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#EA9087',
                cancelButtonColor: '#8497B5',
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Only submit the form for this product
                }
            });
        });
    });

    if (saveprofileChangesBtn) {
        saveprofileChangesBtn.addEventListener('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure you want to save the changes?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#EA9087',
                cancelButtonColor: '#8497B5',
                confirmButtonText: "Yes, Save!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('profile-form').submit();

                    Swal.fire({
                        title: "Saved!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
        });
    }



});

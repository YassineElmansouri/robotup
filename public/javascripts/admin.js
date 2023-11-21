$(document).ready(function(){
    $('.side_menu_links').on("click",function(){
        $('.side_menu_links').removeClass('active');
        $(this).addClass("active");
    });
});

function confirmDelete(roleId) {
    var confirmation = confirm("Are you sure you want to delete this role?");

    if (confirmation) {
        // Assuming Laravel's route() function is available
        var deleteUrl = "{{ route('Delete_role', ['roleId' => ':roleId']) }}";
        // Replace :roleId with the actual roleId
        deleteUrl = deleteUrl.replace(':roleId', roleId);
        
        window.location.href = deleteUrl;
    }
}

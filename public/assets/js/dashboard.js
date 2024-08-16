// public/js/dashboard.js

$(document).ready(function () {
    $('.approve-btn').click(function () {
        var activityId = $(this).data('activity-id');
        approveActivity(activityId);
    });

    $('.reject-btn').click(function () {
        var activityId = $(this).data('activity-id');
        rejectActivity(activityId);
    });

    function approveActivity(activityId) {
        // Make an Ajax request to your Laravel route to handle the approval
        $.ajax({
            url: '/admin/activity/' + activityId + '/approve',
            method: 'PATCH',
            data: {_token: '{{ csrf_token() }}'},
            success: function (response) {
                // Handle success, maybe update the UI
                console.log(response);
            },
            error: function (error) {
                // Handle error
                console.log(error);
            }
        });
    }

    function rejectActivity(activityId) {
        // Make an Ajax request to your Laravel route to handle the rejection
        $.ajax({
            url: '/admin/activity/' + activityId + '/deny',
            method: 'DELETE',
            data: {_token: '{{ csrf_token() }}'},
            success: function (response) {
                // Handle success, maybe update the UI
                console.log(response);
            },
            error: function (error) {
                // Handle error
                console.log(error);
            }
        });
    }
});

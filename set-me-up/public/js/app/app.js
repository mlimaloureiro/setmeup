/*global setmeup, $*/

var serverURL = 'http://localhost:8000/';
var twitterEndPoint = serverURL + 'twitter/';
var facebookEndPoint = serverURL + 'facebook/';
var linkedInEndPoint = serverURL + 'linkedin/';
var pinterestEndPoint = serverURL + 'pinterest/';

window.setMeUp = {

    resultAvailabilityDiv: $('.results-availability'),
    resultAutomationDiv : $('.results-automation'),

    init: function () {
        'use strict';
        this.initEvents();
        console.log('Starting setmeup!');
    },

    initEvents: function() {
        // first step
        $('#submit_check_availability').on('click', this.checkAvailability);
        $('#submitForm').on('click', this.submitForm);
    },

    submitForm: function(evt) {
        evt.preventDefault();

        $username = $("#username_input").val();
        $firstname = $("#firstname_input").val();
        $lastname = $("#lastname_input").val();
        $email = $("#email_input").val();
        $password = $("#password_input").val();
        $birthday_day = $("#birthday_day_input").val();
        $birthday_month = $("#birthday_month_input").val();
        $birthday_year = $("#birthday_year_input").val();
        $sex = $("#sex_input").val();

        console.log($username);
        console.log($firstname);
        console.log($lastname);
        console.log($email);
        console.log($password);
        console.log($birthday_day);
        console.log($birthday_month);
        console.log($birthday_year);
        console.log($sex);

        var obj = {
            'first_name': $firstname,
            'last_name' : $lastname,
            'email'     : $email,
            'email_confirmation' : $email,
            'password'  : $password,
            'birthday_day' : $birthday_day,
            'birthday_month' : $birthday_month,
            'birthday_year' : $birthday_year,
            'sex'   : $sex,
            'username' : $username
        };

        $('.facebook-positive1').hide();
        $('.twitter-positive1').hide();
        //$('.linkedin-positive').hide();
        $('.facebook-negative1').hide();
        $('.twitter-negative1').hide();
        //$('.linkedin-negative').hide();
        $('.facebook-checking1').show();
        $('.twitter-checking1').show();

        /*
        $.post(twitterEndPoint + 'automateInput', obj, function(data) {
            $('.twitter-checking1').hide();

            if(data.success) {
                $('.twitter-positive1').show();
                console.log('twitter is ready');
            } else {
                $('.twitter-negative1').show();
                console.log('something went wrong');
            }
        });
        */

        $.post(facebookEndPoint + 'automateInput', obj, function(data) {
            $('.facebook-checking1').hide();
            if(data.success) {
                $('.facebook-positive1').show();
                console.log('facebook is ready');
            } else {
                $('.facebook-negative1').show();
                console.log('something went wrong');
            }
        });

        

        console.log("submitting form");
    },

    checkAvailability: function(evt) {

        counter = 0;
        evt.preventDefault();
        var username = $('#username_input').val();
        console.log('checking availability');
        
        $('.facebook-positive').hide();
        $('.twitter-positive').hide();
        //$('.linkedin-positive').hide();
        $('.facebook-negative').hide();
        $('.twitter-negative').hide();
        //$('.linkedin-negative').hide();
        $('.facebook-checking').show();
        $('.twitter-checking').show();
        //$('.linkedin-checking').show();

        
        $.get(twitterEndPoint + 'username/availability/' + username, function(data) {
            $('.twitter-checking').hide();

            if(data.exists) {
                $('.twitter-negative').show();
                console.log('twitter is not available');
            } else {
                $('.twitter-positive').show();
                console.log('twitter is available');
            }
        });
        

        $.get(facebookEndPoint + 'username/availability/' + username, function(data) {
            $('.facebook-checking').hide();

            if(data.exists) {
                $('.facebook-negative').show();
                console.log('facebook is not available');
            } else {
                $('.facebook-positive').show();
                console.log('facebook is available');
            }
        });

        /*
        $.get(linkedInEndPoint + 'username/availability/' + username, function(data) {
            $('.linkedin-checking').hide();

            if(data.exists) {
                $('.linkedin-negative').show();
                console.log('linkedin is not available');
            } else {
                $('.linkedin-positive').show();
                console.log('linkedin is available');
            }
        });
        */
    },


};

$(document).ready(function () {
    'use strict';
    setMeUp.init();
});

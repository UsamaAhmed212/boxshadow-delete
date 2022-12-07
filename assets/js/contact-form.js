"use strict";

( function( $ ) {
    document.addEventListener("DOMContentLoaded", function () {
        
        // International Telephone Input Initialize 
        intlTelInputInit(document.querySelectorAll('input[name=phone]'));
        
        // #contact-form > .send-btn  Click Effect
        function toggleClass(element) {
            if( !element.find(".send-btn").hasClass("finished") ) {
                element.find(".send-btn").toggleClass("active");
                element.find(".send-btn").prop('disabled', true);   //Disable Button
            }
        }

        // #contact-form > .send-btn  Click Finish Effect
        function addClass(element) {
            if( !element.find(".send-btn").hasClass("finished") ) {
                element.find(".send-btn").addClass("finished");

                setTimeout(function() {
                    element.find(".send-btn").removeClass("finished");
                    element.trigger("reset");
                    element.find(".send-btn").prop('disabled', false);   //Enable  Button
                }, 1000);
            }
        }


        // Contact Form Handling Using Ajax
        const contactFormSubmitButton = $("#contact-form .send-btn");
        contactFormSubmitButton.click(function(e) {
            e.stopPropagation();
            e.preventDefault();
            
            const contactForm = $(this).parent().parent().parent();
            
            toggleClass(contactForm);

            var contactFormGroup = contactForm.find(".group.warning");
            contactFormGroup.each(function( index, item ) {
                $(item).removeClass("warning");
            });
            
            var array = contactForm.serializeArray();
            var object = {};
            array.forEach(function (array) {
                var name = array.name;
                var value = array.value;
                
                switch (name) {
                    case 'name':
                        value = value.replace(/\s\s+|\t/g, ' ') || false;
                        break;
                    case 'email':
                        value = value.replace(/\s+|\t/g, '').toLowerCase() || false;
                        break;
                    case 'phone':
                        value = value.replace(/\s+|\t/g, '') || false;
                        break;
                    default:
                        value = value || false;
                }
                if (name && value) object[name] = value;
                
            });

            const {
                name = false,
                email = false,
                phone = false,
                message = false,
            } = object;
            
            {
            // const nameElement    =  contactForm.find(".group.name");
            // const emailElement   =  contactForm.find(".group.email");
            // const phoneElement   =  contactForm.find(".group.phone");
            // const messageElement =  contactForm.find(".group.message");
            
            // // Name Verification
            // if ( name != '' && name != null && name != false ) {
                
            //     if ( name.length <= 255 ) {
                
            //         if ( validateName(name) ) {
            //             console.log(name + ' Name is valid ✔️');
            //         } else {
            //             console.log(name + ' Name is Not valid ❌');
            //             setWarning(nameElement, "This name contains certain characters that aren't allowed");
            //         }

            //     } else {
            //         setWarning(nameElement, "There is a limit on the number of characters in name");
            //     }
                
            // } else {
            //     setWarning(nameElement, "What's your name");
            // }

            // // Email Verification
            // if ( email != '' && email != null && email != false ) {
                
            //     if (validateEmail(email)) {
            //         console.log(email + ' email is valid ✔️');
            //     } else {
            //         console.log(email + ' email is Not valid ❌');
            //         setWarning(emailElement, "Please enter a valid email address");
            //     }
                
            // } else {
            //     setWarning(emailElement, "Please enter a valid email address");
            // }

            // // Phone Verification
            // if ( phone != '' && phone != null && phone != false ) {

            //     if (validatePhone(phone)) {
            //         console.log(phone + ' Phone is valid ✔️');
            //     } else {
            //         console.log(phone + ' Phone is Not valid ❌');
            //         setWarning(phoneElement, "Please enter a valid phone address");
            //     }
                
            // } else {
            //     setWarning(phoneElement, "Please enter a valid phone number");
            // }

            // if ( message != '' && message != null && message != false ) {
            //     console.log(message + ' Message is valid ✔️');
            // } else {
            //     setWarning(messageElement, "How can i help you.");
            // }
        
            // var data = {name: name, email:email, phone:phone, message:message};
            // $.ajax({
            //     url: rootPath + '/mail.php',
            //     type: 'POST',
            //     data: data,
            //     success: function(result) {

            //         setTimeout(function() {
            //             toggleClass(contactForm);
            //             addClass(contactForm);
            //         }, 1000);
                    
            //         console.log(result);
            //     }
            // });
            }

            setTimeout(function() {
                toggleClass(contactForm);
                addClass(contactForm);
            }, 1000);

            // var isValidNumber = numberValidation(phone);
            // console.log(isValidNumber);
            
        });

        const contactFormPhone = $("#contact-form input[type=tel]");
        contactFormPhone.keyup(function(event) {
            const contactForm = $(this).parent().parent().parent();
            
            var array = contactForm.serializeArray();
            var object = {};
            array.forEach(function (array) {
                var name = array.name;
                var value = array.value;
                
                switch (name) {
                    case 'name':
                        value = value.replace(/\s\s+|\t/g, ' ') || false;
                        break;
                    case 'email':
                        value = value.replace(/\s+|\t/g, '').toLowerCase() || false;
                        break;
                    case 'phone':
                        value = value.replace(/\s+|\t/g, '') || false;
                        break;
                    default:
                        value = value || false;
                }
                if (name && value) object[name] = value;
                
            });

            const {
                name = false,
                email = false,
                phone = false,
                message = false,
            } = object;

            var phoneLabel = contactFormPhone.parent().prev();
            var isValidNumber = numberValidation(phone);
            console.clear();
            console.log(isValidNumber);
            
            if(isValidNumber.valid) {
                phoneLabel.css("color", "blue").css("font-size", "23px").text( "Phone Number is Valid (" + isValidNumber.valid + ")" );
            } else {
                phoneLabel.css("color", "red").css("font-size", "23px").text( "Phone Number is Not Valid (" + isValidNumber.valid + ")" );
            }
        });

        // Warning Show
        function setWarning(element, message) {
            if( element.length ) {
                element.addClass("warning");

                if( ! element.find(".tooltip").length ) {
                    element.append(`<span class="tooltip">${message}</span>`);
                } else {
                    element.find(".tooltip").text(message);
                }

                var inputField = element.find("input, textarea");
                
                if( ! element.find(".warning-sine").length ) inputField.after('<i class="warning-sine"></i>');

                inputField.focusin(function() {
                    if( element.hasClass("warning") ) element.find(".tooltip").addClass("active");
                });
            
                inputField.focusout(function() {
                    if( element.hasClass("warning") ) element.find(".tooltip").removeClass("active");
                });
            }
        }
        

        // Name Validation
        function nameValidation(name) {
            const specialChars = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~(0-9)]/;
            return ( !specialChars.test(name) ) ? true : false;
        }

        // Email Validation
        function emailValidation(email) {
            return String(email).toLowerCase().match(
            /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
            );
        }

        // Phone Validation
        function validatePhone(phone) {
            return ;
        }
        
    });
})( jQuery );

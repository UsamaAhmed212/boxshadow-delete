window.addEventListener( 'elementor/init', () => {

    var contactForm = elementor.modules.controls.BaseData.extend({ 

        onReady: function() {

            var self = this;
            
            self.saveValue();

            // var checkboxes = this.ui.checkbox;
            
            var checkboxes = this.el.querySelectorAll('.boxshadow-contact-form');

            for(var i= 0; i < checkboxes.length; i++) {

                // if( checkboxes[i].hasAttribute('checked') ) {
                //     checkboxes[i].checked = true;
                    
                // } else {
                //     checkboxes[i].checked = false;
                // }

                checkboxes[i].addEventListener('change', function(event) {

                    if (event.currentTarget.checked) {
                        event.currentTarget.value = 'on';
                    } else {
                        event.currentTarget.value = 'off';
                    }

                    self.saveValue();

                });
            }

        },

        saveValue: function() {
            
            // var checkboxes = this.ui.checkbox;

            var checkboxes = this.el.querySelectorAll('.boxshadow-contact-form');

            var dataObj = {};
            for(var i= 0; i < checkboxes.length; i++) {
                dataObj[checkboxes[i].name] = `${checkboxes[i].value}`;
            }
            
            this.setValue(dataObj);
            // this.setValue({label: 'off', name: 'on', email: 'on', phone: 'on', message: 'off'});
            
            console.log(dataObj);

        },

        onBeforeDestroy: function() {
            
            this.saveValue();

        }

    });

    elementor.addControlView( 'BOXSHADOW_CONTACT_FORM', contactForm );

} );
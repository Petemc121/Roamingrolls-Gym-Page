window.onload = function() {

let deleteButtons = document.getElementsByClassName('minusInstructor');


    for(i=0; i<deleteButtons.length; i++) {

        


   deleteButtons[i].on('click', function(){
    alert('Hey!');

        var deleteButton = this.id
            $.ajax({
                type:'POST',
                url: ajax_object.ajax_url + '?action=delete_instructors',
                data: 'minus_id=' + deleteButton,
                success:function() {
                    alert('success!');
                },
                error:function() {
                    alert('failure!')
                }
            }); 



        });

    }

}
        


        // $('#minusInstructor1').on('click',function(){
        //     $.ajax({
        //         type:'POST',
        //         url: ajax_object.ajax_url + '?action=delete_instructors',
        //         data:'minusInstructor2'

        //     }); 
        // });

        // $('#minusInstructor2').on('click',function(){
        //     $.ajax({
        //         type:'POST',
        //         url: ajax_object.ajax_url + '?action=delete_instructors',
        //         data:'minusInstructor3'

        //     }); 
        // });

        // $('#minusInstructor3').on('click',function(){
        //     $.ajax({
        //         type:'POST',
        //         url: ajax_object.ajax_url + '?action=delete_instructors',
        //         data:'minusInstructor4'

        //     }); 
        // });

        // $('#minusInstructor4').on('click',function(){
        //     $.ajax({
        //         type:'POST',
        //         url: ajax_object.ajax_url + '?action=delete_instructors',
        //         data:'minusInstructor5'
        //     }); 
        // });

   


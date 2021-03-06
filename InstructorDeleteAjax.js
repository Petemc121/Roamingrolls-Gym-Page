

window.onload = function() {

    const minusInstructor = document.getElementsByClassName('minusInstructor');
   
    for(i=0; i<minusInstructor.length; i++) {

    minusInstructor[i].on('click',function(){
        var deleteButton = this.id
            $.ajax({
                type:'POST',
                url: ajax_object.ajax_url + '?action=delete_instructors',
                data: 'minus_id=' + deleteButton,
                success:function() {
                    alert('success!');
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

   


function send_email(send_url,back_url)
{
    var recipient=$('input[name=recipient]').val();
    var subject=$('input[name=subject]').val();
    var message=$('textarea[name=message]').val();
    $.ajax({
        url:send_url,
        type:'POST',
        data:{recipient:recipient,subject:subject,message:message},
        beforeSend:function(){
          $('#send_mail').html('Please Wait...')  
        },
        success:function(result){
            if($.trim(result)=='1')
                $('.con_mess_area').html('Invalid Recipient <a href="'+back_url+'"><span style="color:blue">Click to back</span></a>');
            else
                $('.con_mess_area').html('Message successfully Sent <a href="'+back_url+'"><span style="color:blue">Click to back</span></a>');
        },
        error:function(err){
            alert('Error '+err.status);
        }
    });
}

function tell_friend(send_url,back_url)
{
    var recipient_name=$('input[name=recipient_name]').val();
    var recipient=$('input[name=recipient]').val();
    var subject=$('input[name=subject]').val();
    var message=$('textarea[name=message]').val();
    $.ajax({
        url:send_url,
        type:'POST',
        data:{recipient_name:recipient_name,recipient:recipient,subject:subject,message:message},
        beforeSend:function(){
          $('input[name=send]').css('font-size','14px');
          $('input[name=send]').val('Please Wait...')  
        },
        success:function(result){
            $('.tell_rgform').html('Invitation successfully Sent <a href="'+back_url+'"><span style="color:blue">Click to Send another</span></a>');
        },
        error:function(err){
            alert('Error '+err.status);
        }
    });
}
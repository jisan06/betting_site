<script type="text/javascript">
    $('#submit_bet').click(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var betting_id = $('.bet_modal_betting_id').val();
        var betting_stack = $('.altv-3').text();
        var wining_amount = $('.number-of-bet-count').text();

        Swal.fire({  
            title: "Are you sure?",   
            text: "If you want to bett, click yes button",     
            showCancelButton: true,   
            confirmButtonColor: "#DD6B55",   
            confirmButtonText: "Yes",   
            cancelButtonText: "No",
        }).then(function(isConfirm) {  
                if (isConfirm) {
                    $.ajax({
                        type: "POST",
                        url : "{{ route('user.saveBett') }}",
                        data : 
                            {
                                betting_id:betting_id,
                                betting_stack:betting_stack,
                                wining_amount:wining_amount,
                            },
                        success: function(response) {
                            Swal.fire({  
                                title: "<small class='text-success'>Success!</small>", 
                                type: "success",
                                text: "Your bett saved",
                                timer: 3000,
                            });

                            $('.single_bett_'+betting_id).addClass('disabled');
                            $('#balance').text(response.balance);
                            closeModal();
                        },
                        error: function(response) {
                            error = "Failed.";
                            errorMessage = Object.entries(response.responseJSON.errors);
                            Swal.fire({ 
                                title: "<p class='text-danger' style='line-height:30px;font-size:20px;'>Error !  "+errorMessage[0][1]+"</p>",
                                type: "error",
                                timer: 4000,
                            });
                        }
                    });    
                } 
            });
    });
    function bettAmountFunction(){
        var odds = $('.bet-modal').find('.number-of-stake').val();
        $('.bet-modal').find('.number-of-stake-count').val(odds);
        $('.altv-3').html(odds);

        var betNumber = $('.bet-modal').find('.place-of-bet-number').val();
        var stakeCount = $('.bet-modal').find('.number-of-stake-count').val();
        var betTotal = betNumber * stakeCount;
        var n = betTotal.toFixed(2);
        $('.bet-modal').find('.number-of-bet-count').html(n);
    }

    function closeModal(){
        $('.bet-modal-bg').removeClass('show');
        $('.bet-modal').removeClass('open');
        $('body').css('padding-right', '0');
        $('.number-of-stake').val(100); 
        $('.number-of-stake-count').val(100);
        $('.altv-1').remove();
        $('.altv-2').remove();
        $('.altv-3').remove();
        $('.bet-modal-bg').removeClass('show');

        var html = jQuery('html');
        var scrollPosition = html.data('scroll-position');
        html.css('overflow', html.data('previous-overflow'));
        window.scrollTo(scrollPosition[0], scrollPosition[1]);
    }
</script>
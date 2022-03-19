$("#account_type, #edit_account_type").change(function () {

    if ($(this).val() == "BKASH" || $(this).val() == "NAGAD" || $(this).val() == "ROCKET" || $(this).val() == "UPAY") {
        $('#bank_name').hide(); 
        $('#branch_name').hide();
        $('#edit_bank_name').hide(); 
        $('#edit_branch_name').hide();

    } else {
        $('#bank_name').show(); 
        $('#branch_name').show(); 
        $('#edit_bank_name').show(); 
        $('#edit_branch_name').show(); 
    }
});
$("#account_type, #edit_account_type").trigger("change");
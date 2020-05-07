<script>
    function payWithPaystack(){
    var handler = PaystackPop.setup({
    key: 'pk_test_93253e4094828ef15dfd864b9decb3dfceb75a8f',
    email: '<?php echo $email?>',
    amount: '<?php echo $b2 ?>00',
    currency: "NGN",
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    firstname: 'Stephen',
    lastname: 'King',
    // label: "Optional string that replaces customer email"
    metadata: {
     custom_fields: [
        {
            display_name: "Mobile Number",
            variable_name: "mobile_number",
            value: "+2348012345678"
        }
     ]
    },
    callback: function(response){ 
      alert('success. transaction ref is ' + response.reference);
      window.location.href = 'ref.php?ref=' + response.reference;

    },
    onClose: function(){
      alert('window closed');
    }
    });
    handler.openIframe();
    }
    </script>
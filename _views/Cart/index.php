
<?php
require "_views/_includes/_navbar.php";
$kosar = $this->data;
if(count($kosar) < 1){
    include '_views/_includes/_carts/_ncart.php';
}
else {
    include '_views/_includes/_carts/_ycart.php';
    include '_views/_includes/_modals/_modal_pickpack.php';
    include '_views/_includes/_modals/_modal_ossz.php';
    include '_views/_includes/_modals/_modal_remove_item.php';
    include '_views/_includes/_modals/_modal_info.php';
    include '_views/_includes/_modals/_modal_afa.php';
}
require "_views/_includes/_footers/footer.php";
?>

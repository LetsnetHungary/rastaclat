<!-- Shared scripts start-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php
if($this->jsdata != null)
{
foreach($this->jsdata as $jsdata)
{
?>
        <script type="text/javascript" src = "<?php echo "../../".$jsdata ?>"></script>
<?php
}
}
?>
<!-- Shared scripts end -->
</body>
</html>

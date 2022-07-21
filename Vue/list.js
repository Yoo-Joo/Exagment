<script>
  $('#form').change(function () {
    $('#form').attr('action', '..\Controlleur\permuter.php?id_enseignant=' + $('#permuter').val())
});
</script>
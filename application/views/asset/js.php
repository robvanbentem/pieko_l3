<?php if(false) {?>
<script type="text/javascript">
<?php } ?>

    $(document).ready(function () {
        $("#toolbar_pick_date").datepicker({
            noDefault:false, // set this to true if you don't want the current date inserted if the value-attribute is empty
            format:'yyyy-mm-dd',
            weekStart:1,
            days:["zo", "ma", "di", "wo", "do", "vr", "za"],
            months:["januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december"]
        }).on('changeDate', function (ev) {
            window.location = '/home/date/' + ev.date.valueOf() + "?redir=" + window.location.pathname;
        });
    });

<?php if(false) {?>
</script>
<?php } ?>
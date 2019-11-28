<p>
    <div class="tooltip">
        <input type="submit" class="pagination" value="<<" id="first" name="first">
        <span class="tooltiptext">Primeira página</span>
    </div>
    <input type="submit" class="pagination" value="<" id="prior" name="prior">

    <?php for ($i = 1; $i <= $numberOfPages; $i++) : ?>
        <input type="submit" class=<?php echo ($page == $i) ? "selected-page" : "pagination"; ?> value=<?php echo $i; ?> id="page" name="page">
    <?php endfor ?>

    <input type="submit" class="pagination" value=">" id="next" name="next">
    <input type="submit" class="pagination" value=">>" id="last" name="last">

    <input type="text" hidden value="<?php echo $offset; ?>" id="offset" name="offset">
</p>
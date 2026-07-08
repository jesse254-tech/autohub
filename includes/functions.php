<?php
function money($amount)
{
    return 'KSh ' . number_format((float) $amount, 0);
}

function km($n)
{
    return number_format((float) $n, 0) . ' km';
}

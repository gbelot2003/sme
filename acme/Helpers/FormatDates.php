<?php
namespace Acme\Helpers;
use Carbon\Carbon;

class FormatQueryDates
{
    private $inicio;
    private $final;

    function __construct($inicio, $final)
    {
        $this->inicio = $inicio;
        $this->final = $final;
    }

    /**
     * @return array
     */
    public function formatQueryDates()
    {
        $bdate = Carbon::createFromFormat('Y-m-d', $this->inicio)->startOfDay();
        $edate = Carbon::createFromFormat('Y-m-d', $this->final)->endOfDay();
        return array($bdate, $edate);
    }
}
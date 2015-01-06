<?php
    
class ChartController extends BaseController {
    
    public function showChart()
    {
        return View::make('charts.chart');
    }
    
}
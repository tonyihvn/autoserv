<?php

namespace App\Http\Controllers;

use App\Models\jobs;
use App\Models\vehicle;
use App\Models\contacts;
use App\Models\serviceorder;
use App\Models\sale;
use App\Models\diagnosis;
use App\Models\User;
use App\Models\partsorder;
use App\Models\payments;
use App\Models\parts;
use Illuminate\Http\Request;
// use PDF;

class Job {
    public $id = 0;
    public $jobno = 0;
    public $jobid=0;
    public $amount = 0;
    public $labour = 0;
    public $vat=0;
    public $sundry = 0;
    public $discount = 0;
    public $serviceorder = [];
    public $contact = [];
    public $partsorder = [];
    public $diagnosis = [];
    public $sale = [];
}

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = jobs::where('status','Pending')->with('payment')->orderBy('dated','desc')->orderBy('status','desc')->paginate(400);
        $lastinvoiceno = jobs::max('jid');
        return view('jobs', compact('jobs','lastinvoiceno'));
    }

    public function completedJobs()
    {
        $jobs = jobs::where('status','Done')->with('payment')->orderBy('dated','desc')->orderBy('status','desc')->paginate(400);
        $lastinvoiceno = jobs::max('jid');
        return view('jobs', compact('jobs','lastinvoiceno'));
    }

    public function customerJobs($customerid)
    {
        $jobs = jobs::where('customerid','=',$customerid)->orderBy('dated','desc')->orderBy('status','desc')->with(['contact'])->get();
        $lastinvoiceno = jobs::max('jid');
        return view('cjobs', compact('jobs','customerid','lastinvoiceno'));
    }

    public function vehicleJobs($vregno)
    {
        $jobs = jobs::where('vregno','=',$vregno)->orderBy('dated','desc')->orderBy('status','desc')->get();
        $lastinvoiceno = jobs::max('jid');
        return view('vjobs', compact('jobs','lastinvoiceno'));
    }

    public function editJob($jobno)
    {
        $job = jobs::where('jobno',$jobno)->first();
        $vehicle = vehicle::where('jobno',$jobno)->orWhere('vregno',$job->vregno)->first();
        $contacts = contacts::select('name')->get();

        $jobno = $job->jobno;
        $editjobno = $job->jobno;
        return view('new-customer', compact('job','vehicle','jobno','contacts','editjobno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $jobno = jobs::select('jobno')->orderBy('id','desc')->first()->jobno;
        $parts = parts::select('id','part_name','selling_price')->get();
        /*$clist = "";
        foreach($contacts as $con){
            $clist.="'".$con->name."',";
        }
        $clist = substr($clist, 0, -1);
        */
        $jobno=$jobno+1;
        $new_job = new Job();
        return view('new-customer', compact('jobno','new_job','parts'));
    }

    public function newCustomerJob($customerid)
    {
        $jobno = jobs::select('jobno')->orderBy('id','desc')->first()->jobno;
        $contact = contacts::select('customerid','vat','sundry','credit')->where('customerid',$customerid)->first();
        $jobno=$jobno+1;
        return view('new-customerjob', compact('jobno','customerid','contact'));
    }

    public function newVehicleJob($customerid,$vid)
    {
        $jobno = jobs::select('jobno')->orderBy('id','desc')->first()->jobno;
        $vehicleinfo = vehicle::where('id',$vid)->first();
        $contact = contacts::select('customerid','vat','sundry','credit')->where('customerid',$customerid)->first();
        $jobno=$jobno+1;
        return view('new-customerjob', compact('jobno','customerid','contact','vehicleinfo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $jno = jobs::select('jobno')->orderBy('id','desc')->first()->jobno;

        $jobno = $jno+1;



        if($request->editjobno!=''){
            $jobno = $request->editjobno;
        }

        if(!isset($request->newcjob)){

            contacts::updateOrCreate(['customerid'=>$request->customerid],
                $request->only(
                'name',
                'organization',
                'telephoneno',
                'email',
                'sundry',
                'vat',
                'credit',
                'remarks',
                'customerid'
            ));
        }

            $veh = vehicle::updateOrCreate(['vregno'=>$request->vregno],$request->only(
                'customerid',
                'vregno',
                'regdate',
                'modelname',
                'modelno',
                'frameno',
                'vin',
                'chasisno',
                'color',
                'vcondition',
                'daterecieved',
                // 'jobno'
            ));

            $veh->jobno = $jobno;
            $veh->save();


        $job =  jobs::updateOrCreate(['jobno'=>$jobno],$request->only(
            'customerid',
            // 'jobno',
        ));

        if($request->servicename!==null){
            $description = $request->servicename[0];
            $status = "Pending";
            $dated = date('Y-m-d');
        }else{
            $description = $request->diagnosis;
            $status = "Pending";
            $dated = date('Y-m-d');
        }
        $job->vregno = $request->vregno;
        $job->description = $description;
        $job->status = $status;
        $job->dated = $dated;
        $job->amount = $request->totalamount;
        $job->vat = $request->vatcost;
        $job->labour = $request->labour;
        $job->sundry = $request->sundrycost;
        $job->discount = $request->discountcost;
        $job->jobno = $jobno;
        $job->odometer = $request->vin;
        $job->save();

        if($request->servicename==""){
            serviceorder::updateOrCreate(['jobno'=>$jobno],[
                'customerid'=>$request->customerid,
                'jobno'=>$jobno,
                'servicename'=>"Diagnosis and Repair",
                'description'=>$request->diagnosis,
                'mileage'=>$request->vin,
                'amount'=>0,
                'sdate'=>date('Y-m-d'),
                'nextservicedate'=>date('Y-m-d', strtotime($request->ddate. ' + 90 days')),
                'status'=>$status
            ]);

        }else{

            serviceorder::updateOrCreate(['jobno'=>$jobno],[
                'customerid'=>$request->customerid,
                'jobno'=>$jobno,
                'servicename'=>$request->servicename,
                'description'=>$request->description,
                'mileage'=>$request->mileage,
                'amount'=>0,
                'sdate'=>date('Y-m-d'),
                'nextservicedate'=>date('Y-m-d',strtotime($request->nextservicedate)),
                'status'=>$status
            ]);

        }
        partsorder::where('jobno',$jobno)->delete();

        for ($i=0; $i < count($request->partname); $i++) {

            $sale = partsorder::updateOrCreate(['jobno'=>$jobno, 'partsname'=>$request->partname[$i]],[
            'customerid'=>$request->customerid,
            'jobno'=>$jobno,
            'partsname'=>$request->partname[$i],
            'quantity'=>$request->quantity[$i],
            'pdate'=>date('Y-m-d'),
            'amount'=>$request->amount[$i],
            'pid'=>$request->pnid[$i],
            ]);


        }

        $diag = diagnosis::updateOrCreate(['jobno'=>$jobno],$request->only(
            'customerid',
            // 'jobno',
            'diagnosis',
            'problems',
            'causes',
            'request',
            'deliverydate',
            'dstatus',
            'instructions',
            'remarks'
        ));

        $diag->jobno = $jobno;
        $diag->save();

        return redirect()->route('newjob')->with(['message'=>'Order Saved Successfully! <br> <a href="/invoice/'.$jobno.'/estimate" class="btn btn-primary">Print Job Estimate</a> OR <br> <a href="/invoice/'.$jobno.'/instruction" class="btn btn-primary">Print Job Instruction</a>']);


    }

    public function addJobno(Request $request)
    {
        $jexist = jobs::where('jid', '=', $request->jid)->first();
        if ($jexist === null) {
            $job = jobs::where('id',$request->id)->update(['jid'=>$request->jid]);

            foreach($job->partsorder as $part){
                $part->stock()->decrement('quantity_in_stock', $part->quantity);
            }

            $message = 'Job Number Updated for: '.$request->jid;
        }else{
            $message = 'Error! The Job No already exist in the ERP';
        }

        return redirect()->back()->with(['message'=>$message]);

    }


    public static function getCurrency2(float $num)
    {
        $decones = array(
            '01' => "One",
            '02' => "Two",
            '03' => "Three",
            '04' => "Four",
            '05' => "Five",
            '06' => "Six",
            '07' => "Seven",
            '08' => "Eight",
            '09' => "Nine",
            10 => "Ten",
            11 => "Eleven",
            12 => "Twelve",
            13 => "Thirteen",
            14 => "Fourteen",
            15 => "Fifteen",
            16 => "Sixteen",
            17 => "Seventeen",
            18 => "Eighteen",
            19 => "Nineteen"
        );
        $ones = array(
                0 => " ",
                1 => "One",
                2 => "Two",
                3 => "Three",
                4 => "Four",
                5 => "Five",
                6 => "Six",
                7 => "Seven",
                8 => "Eight",
                9 => "Nine",
                10 => "Ten",
                11 => "Eleven",
                12 => "Twelve",
                13 => "Thirteen",
                14 => "Fourteen",
                15 => "Fifteen",
                16 => "Sixteen",
                17 => "Seventeen",
                18 => "Eighteen",
                19 => "Nineteen"
                );
        $tens = array(
                0 => " ",
                1 => " ",
                2 => "Twenty",
                3 => "Thirty",
                4 => "Forty",
                5 => "Fifty",
                6 => "Sixty",
                7 => "Seventy",
                8 => "Eighty",
                9 => "Ninety",
                );
        $hundreds = array(
                "Hundred",
                "Thousand",
                "Million",
                "Billion",
                "Trillion",
                "Quadrillion"
                ); //limit t quadrillion
        $num = number_format($num,2,".",",");
        $num_arr = explode(".",$num);
        $wholenum = $num_arr[0];
        $decnum = $num_arr[1];
        $whole_arr = array_reverse(explode(",",$wholenum));
        krsort($whole_arr);
        $rettxt = "";
        foreach($whole_arr as $key => $i){
        if($i < 20){
            if($i==000 || $i==00){
                $rettxt .= " ";
            }else{
                $rettxt .= $ones[$i];
            }

        }
        elseif($i < 100){
            $rettxt .= $tens[substr($i,0,1)];
            $rettxt .= " ".$ones[substr($i,1,1)];
        }
        else{
            $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
            $rettxt .= " ".$tens[substr($i,1,1)];
            $rettxt .= " ".$ones[substr($i,2,1)];
        }
        if($key > 0){
            $rettxt .= " ".$hundreds[$key]." ";
        }

        }
        $rettxt = $rettxt." Naira";

        if($decnum > 0){
        $rettxt .= " and ";
        if($decnum < 20){
            $rettxt .= $decones[$decnum];
        }
        elseif($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " ".$ones[substr($decnum,1,1)];
        }
        $rettxt = $rettxt." Kobo";
        }
        return $rettxt;
    }

    public function printInvoice($jobno,$type)
    {

        $job = jobs::where('jobno',$jobno)->first();
        $vregno = $job->vregno;

        if(strlen($vregno)<2){
            $vcheck = diagnosis::select('remarks')->where('jobno',$jobno)->first();
            $vregno = $vcheck->remarks;
        }

        if($type=="receipt"){
            $job = payments::where('jobno',$jobno)->orderBy('id','desc')->first();
            $vregno = "";
        }

        $vehicle = vehicle::where('vregno',$vregno)->orderBy('updated_at','desc')->first();

        // dd($vehicle->vregno);

        if($type=='invoice'){
            $title = "INVOICE";
        }else if($type=='receipt'){
            $title = "RECEIPT";
        }else if($type=='estimate'){
            $title = "ESTIMATE";
        }else if($type=='instruction'){
            $title = "JOB INSTRUCTION";
        }

            $pdf_doc = \PDF::loadView('invoice', compact('job','vehicle','title'));

            // return $pdf_doc->save('public/pdf/'.$type.'-'.$jobno.'.pdf')->stream($type.'-'.$jobno.'.pdf');

        return view('invoice', compact('job','vehicle','title'));
    }

    public function jobSearch(request $request)
    {
        $keyword = $request->keyword; // you could also $request->has('query')
        $lastinvoiceno = jobs::max('jid');
        if(is_numeric($keyword)){

            $jobs = jobs::where('jid', 'like', '%' . $keyword . '%')->paginate(400);

          return view('jobs', compact('jobs','lastinvoiceno'));

        }else{
            // $jobs = jobs::where('jid', $keyword)->orWhere('customerid', 'like', '%' . $keyword . '%')->paginate(400);
            $contacts = contacts::where('name',  'like', '%' . $keyword . '%')->orWhere('organization', 'like', '%' . $keyword . '%')->orWhere('customerid', 'like', '%' . $keyword . '%')->paginate(400);

            return view('contactsearch', compact('contacts'));
        }

    }

    public function filterJobs(request $request)
    {
        $from = date('Y-m-d', strtotime($request->from));
        $to = date('Y-m-d', strtotime($request->to));
        $lastinvoiceno = jobs::max('jid');

        // $jobs = jobs::where('jid', $keyword)->orWhere('customerid', 'like', '%' . $keyword . '%')->paginate(400);
        $jobs = jobs::whereBetween('dated',  [$from, $to])->orderBy('dated','desc')->paginate(400);

      return view('jobs', compact('jobs','lastinvoiceno'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(jobs $jobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(jobs $jobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jobs $jobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(jobs $jobs)
    {
        //
    }

    public function genericDelete($id,$table)
    {
        if($table=="payments"){
            payments::findOrFail($id)->delete();
        }
        if($table=="jobs"){
            jobs::findOrFail($id)->delete();
        }

        if($table=="contacts"){
            contacts::findOrFail($id)->delete();
        }

        if($table=="serviceorder"){
            serviceorder::findOrFail($id)->delete();
        }

        if($table=="sale"){
            sale::findOrFail($id)->delete();
        }

        if($table=="partsorder"){
            partsorder::findOrFail($id)->delete();
        }

        if($table=="user"){
            User::findOrFail($id)->delete();
        }
        $message = 'The record has been deleted!';
        return redirect()->route('home')->with(['message'=>$message]);
    }

    public function changedate(Request $request)
    {
        return redirect('invoice/'.$request->jobno.'/invoice')->with('newdate', $request->changedate);
    }
}

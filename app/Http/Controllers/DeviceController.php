<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\DataFromRasp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * For registered devices
     */

    public function index()
    {
        $data=Device::all();
        return view('backend.auth.user.device', compact("data"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $deviceID)
    {
        $device = Device::firstWhere('id', $deviceID);
        return view('backend.auth.user.singleDevice', compact("device"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }

    /**
     * Displays the data that is selected
     */

    public function showDev(Device $deviceID)
    {
        
    }

    /**
     * Displays all data present in the table data_from_rasps
     * 
     * The data are all the devices that the raspberry can capture 
     */
    public function visualizeData() 
    {
        $data=DataFromRasp::paginate(10);
        return view('backend.auth.user.dictionary', compact("data"));
    }

    /**
     * Raspberry capture and send the data to the DB and save in another
     * table of the same DB the MAC addresses of interest
     */
    public function getData(Request $request)
    {   
        $m_data = $request->get('m_data');
        $r_data = $request->get('r_data');
        DataFromRasp::create(['MAC' => $m_data, 'RSSI' => $r_data]);
        if(($m_data == 'C4:A5:DF:24:05:7E') and Device::where('MAC_ADDR', $request->m_data)->doesntExist()){ 
            Device::create(['USERNAME'=>'Device1','MAC_ADDR' => $m_data]);
        }
        if(($m_data == '70:1C:E7:E4:71:DA') and Device::where('MAC_ADDR', $request->m_data)->doesntExist()){ 
            Device::create(['USERNAME' => 'Device2','MAC_ADDR' => $m_data]);
        }
    }

    public function scan()
    {
        $process = new Process(['C:\Simone\Universit??\Tirocinio\laravel-boilerplate-master', 'prova.py']);
        $process->run();
        if (!$process->isSuccessful()) { throw new ProcessFailedException($process); }
        return redirect()->route('dict');
    }

    public function FirstDev(Device $deviceID){        
        /*$device = Device::firstWhere('id', $deviceID);
        $dev = DB::table('data_from_raps')->select('MAC', 'RSSI')->get();
        return view('backend.auth.user.singleDevice', compact("dev"));

        $dev = DB::table('data_from_rasps')->select('MAC', 'RSSI')->where($device, '=', $deviceID)->get();
        dd($dev);*/

        $time = DataFromRasp::where('MAC', 'C4:A5:DF:24:05:7E')->get()->pluck('RSSI', 'created_at');
        return view('backend.auth.user.singleDevice', compact("time"));
        
    }
}

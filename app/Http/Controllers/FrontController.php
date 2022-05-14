<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use App\Models\Contact;
use App\Models\Payment;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{


    public function index()
    {
        $campaign = Campaign::orderBy('publish_date', 'desc')->get();

        // \dd($campaign);
        return view('front.welcome', \compact('campaign'));
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contact_store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'subject' => 'required|min:4',
            'message' => 'required|min:4',
        ]);

        if ($validated->fails()) {
            return back()
                ->withInput()
                ->withErrors($validated->errors());
        }

        Contact::create($request->all());

        return back()
            ->with(
                [
                    'message' => 'Kontak baru berhasil ditambah',
                    'success' => true
                ]
            );
    }

    public function about()
    {
        return view('front.about');
    }

    public function donation(Request $request)
    {
        $category = Category::orderBy('name')->get()->pluck('name', 'id');

        $campaign = Campaign::when($request->has('categories') && count($request->categories) > 0, function ($query) use ($request) {
            $query->whereHas('category_campaign', function ($query) use ($request) {
                $query->whereIn('category_id', $request->categories);
            });
        })
            ->orderBy('publish_date', 'desc')
            ->paginate(1)
            ->withQueryString();


        return view('front.donation.index', \compact('category', 'campaign'));
    }

    public function donation_detail($id)
    {
        $campaign = Campaign::findOrFail($id);

        return view('front.donation.show', compact('campaign'));
    }

    public function donation_create($id)
    {
        $campaign = Campaign::findOrFail($id);
        $user = User::whereHas('role', function ($query) {
            $query->where('name', 'donatur');
        })->get();
        return view('front.donation.create', \compact('campaign', 'user'));
    }

    public function donation_store(Request $request, $id)
    {
        // \dd($id);
        $validated = Validator::make($request->all(), [
            'nominal' => 'required|integer|min:500',
            'user_id' => 'required|exists:users,id',
            'anonim' => 'nullable|in:1,0',
            'support' => 'nullable',
        ]);

        if ($validated->fails()) {
            return back()
                ->withInput()
                ->withErrors($validated->errors());
        }

        $campaign = Campaign::findOrFail($id);
        $donation = Donation::create([
            'campaign_id' => $campaign->id,
            'nominal' => $request->nominal,
            'user_id' => $request->user_id,
            'anonim' => $request->anonim,
            'support' => $request->support,
            'order_number' => 'PX' . mt_rand(000000, 999999),
            'status' => 'not confirmed',
        ]);


        return redirect('/donation/' . $campaign->id . '/payment/' . $donation->order_number)
            ->with(
                [
                    'message' => 'Donasi baru berhasil disimpan',
                    'success' => true
                ]
            );
    }


    public function donation_payment($id, $order_number)
    {
        $campaign = Campaign::findOrFail($id);
        $donation = Donation::where('order_number', $order_number)->first();
        $bank = Bank::all();

        if (!$donation) {
            abort(404);
        }
        return view('front.donation.payment', compact('campaign', 'donation', 'bank'));
    }

    public function donation_payment_confirmation($id, $order_number)
    {
        $campaign = Campaign::findOrFail($id);
        $donation = Donation::where('order_number', $order_number)->first();
        $payment = Payment::where('order_number', $order_number)->first() ?? new Payment();
        $bank = Bank::all()->pluck('name', 'id');

        if (!$donation) {
            abort(404);
        }

        return view('front.donation.payment_confirmation', compact('campaign', 'donation', 'payment', 'bank'));
    }

    public function donation_payment_confirmation_store(Request $request, $id, $order_number)
    {
        $payment = Payment::where('order_number', $order_number)->first() ?? new Payment();

        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'nominal' => 'required|integer|min:500',
            'bank_id' => 'required|exists:bank,id',
            'path_image' => $payment ? 'nullable|mimes:png,jpg,jpeg,pdf|max:2048' : 'required|mimes:png,jpg,jpeg,pdf|max:2048',
            'note' => 'nullable',
        ]);

        if ($validated->fails()) {
            return back()
                ->withInput()
                ->withErrors($validated->errors());
        }

        $campaign = Campaign::findOrFail($id);
        $donation = Donation::where('order_number', $order_number)->first();

        if (!$donation) {
            abort(404);
        }

        if (!$donation->status == 'confirmed') {
            return back()->with([
                'message' => 'Pembayaran sudah dikonfirmasi',
                'error_msg' => true,
            ]);
        }

        $data = $request->except('path_image');
        $data['user_id'] = $campaign->user_id;
        $data['order_number'] = $donation->order_number;
        if ($request->has('path_image')) {
            # code...
            if (Storage::disk('public')->exists($payment->path_image)) {
                Storage::disk('public')->delete($payment->path_image);
            }
            $data['path_image'] = upload('payment', $request->file('path_image'), 'payment');
        }

        Payment::updateOrCreate(
            ['order_number' => $donation->order_number],
            $data
        );

        return back()->with([
            'message' => 'Upload konfirmasi pembayaran berhasil disimpan',
            'success' => true,
        ]);

        // dd($request->all());

    }

    public function subscriber_store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|unique:subscribers,email'
        ]);

        if ($validated->fails()) {
            return back()
                ->withInput()
                ->with(
                    [
                        'message' => $validated->errors()->first(),
                        'error_msg' => true
                    ]
                );
        }

        Subscriber::create($request->only('email'));

        return back()
            ->with(
                [
                    'message' => 'Subscriber baru berhasil ditambah',
                    'success' => true
                ]
            );
    }
}

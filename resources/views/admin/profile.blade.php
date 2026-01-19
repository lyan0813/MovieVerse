@extends('layouts.admin')

@section('content')
<div style="padding: 30px;">
    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 30px;">
        <h2 style="margin: 0; font-size: 24px; font-weight: 700;">Admin Settings</h2>
        <span style="color: #666;">Account > Profile</span>
    </div>

    <div style="background: white; border-radius: 12px; box-shadow: 0 2px 15px rgba(0,0,0,0.05); overflow: hidden; display: flex; min-height: 450px;">
        <div style="background: #fdfdfd; width: 320px; padding: 50px 40px; text-align: center; border-right: 1px solid #eee;">
            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->username }}&background=e50914&color=fff&size=150" 
                 style="width: 140px; height: 140px; border-radius: 50%; border: 5px solid #fff; box-shadow: 0 8px 20px rgba(0,0,0,0.1);">
            
            <h3 style="margin: 20px 0 5px 0; color: #333; font-size: 1.4rem;">{{ Auth::user()->username }}</h3>
            <p style="color: #e50914; font-weight: 700; font-size: 12px; letter-spacing: 1px; margin-bottom: 30px;">SUPER ADMIN</p>
            
            <hr style="border: 0; border-top: 1px solid #eee; margin-bottom: 20px;">
            
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="width: 100%; background: #fceaea; color: #e50914; border: 1px solid #f5c6cb; padding: 12px; border-radius: 8px; cursor: pointer; font-weight: bold; transition: 0.3s;" 
                        onmouseover="this.style.background='#e50914'; this.style.color='white'" 
                        onmouseout="this.style.background='#fceaea'; this.style.color='#e50914'">
                    <i class="fa-solid fa-right-from-bracket"></i> SIGN OUT
                </button>
            </form>
        </div>

        <div style="flex: 1; padding: 50px;">
            <h4 style="margin-top: 0; margin-bottom: 30px; color: #333; font-size: 18px;">Account Details</h4>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                <div style="margin-bottom: 25px;">
                    <label style="display: block; color: #aaa; font-size: 11px; font-weight: 800; text-transform: uppercase; margin-bottom: 8px;">Username</label>
                    <p style="font-size: 16px; color: #333; margin: 0; font-weight: 500;">{{ Auth::user()->username }}</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display: block; color: #aaa; font-size: 11px; font-weight: 800; text-transform: uppercase; margin-bottom: 8px;">Email Address</label>
                    <p style="font-size: 16px; color: #333; margin: 0; font-weight: 500;">{{ Auth::user()->email }}</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display: block; color: #aaa; font-size: 11px; font-weight: 800; text-transform: uppercase; margin-bottom: 8px;">Phone Number</label>
                    <p style="font-size: 16px; color: #333; margin: 0; font-weight: 500;">{{ Auth::user()->no_telp }}</p>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display: block; color: #aaa; font-size: 11px; font-weight: 800; text-transform: uppercase; margin-bottom: 8px;">Account Created</label>
                    <p style="font-size: 16px; color: #333; margin: 0; font-weight: 500;">{{ Auth::user()->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
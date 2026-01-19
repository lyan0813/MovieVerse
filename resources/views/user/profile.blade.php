@extends('layouts.user')

@section('content')
<div style="max-width: 800px; margin: 50px auto; padding: 20px;">
    
    <div style="background: rgba(255, 255, 255, 0.05); backdrop-filter: blur(10px); border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.1); padding: 40px; box-shadow: 0 15px 35px rgba(0,0,0,0.5);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="https://ui-avatars.com/api/?name={{ $user->username }}&background=e50914&color=fff&size=128" 
                 style="width: 120px; height: 120px; border-radius: 50%; border: 4px solid #e50914; margin-bottom: 15px;">
            <h2 style="color: white; margin: 0; font-size: 2rem;">User Profile</h2>
            <p style="color: #888;">Manage your personal information</p>
        </div>

        <hr style="border: 0; border-top: 1px solid rgba(255,255,255,0.1); margin: 30px 0;">

        <div style="display: grid; gap: 20px;">
            {{-- Username --}}
            <div style="background: rgba(0,0,0,0.2); padding: 20px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <label style="display: block; color: #e50914; font-size: 0.8rem; font-weight: bold; text-transform: uppercase;">Username</label>
                    <span style="color: white; font-size: 1.1rem;">{{ $user->username }}</span>
                </div>
                <i class="fa-solid fa-user" style="color: rgba(255,255,255,0.2); font-size: 1.5rem;"></i>
            </div>

            {{-- Email --}}
            <div style="background: rgba(0,0,0,0.2); padding: 20px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <label style="display: block; color: #e50914; font-size: 0.8rem; font-weight: bold; text-transform: uppercase;">Email Address</label>
                    <span style="color: white; font-size: 1.1rem;">{{ $user->email }}</span>
                </div>
                <i class="fa-solid fa-envelope" style="color: rgba(255,255,255,0.2); font-size: 1.5rem;"></i>
            </div>

            {{-- No Telepon --}}
            <div style="background: rgba(0,0,0,0.2); padding: 20px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <label style="display: block; color: #e50914; font-size: 0.8rem; font-weight: bold; text-transform: uppercase;">Phone Number</label>
                    <span style="color: white; font-size: 1.1rem;">{{ $user->no_telp }}</span>
                </div>
                <i class="fa-solid fa-phone" style="color: rgba(255,255,255,0.2); font-size: 1.5rem;"></i>
            </div>
        </div>

        <div style="margin-top: 40px; text-align: center;">
            <a href="{{ route('user.home') }}" style="text-decoration: none; color: #888; font-size: 0.9rem; transition: 0.3s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='#888'">
                <i class="fa-solid fa-arrow-left"></i> Back to MovieVerse
            </a>
        </div>
    </div>
</div>
@endsection
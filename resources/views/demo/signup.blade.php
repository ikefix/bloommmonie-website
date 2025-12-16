@extends('layouts.app')

@section('content')
<div class="demo-container">
    <h2>Book Your 14 Days Free Demo</h2>

    @if(session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    <form action="{{ route('demo.submit') }}" method="POST" class="demo-form">
        @csrf
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" required>

        <label for="phone">Phone (optional)</label>
        <input type="text" name="phone" id="phone">

        <label for="note">Notes (optional)</label>
        <textarea name="note" id="note" rows="4"></textarea>

        <button type="submit">Submit Demo Request</button>
    </form>
</div>

<style>
.demo-container {
    max-width: 480px;
    margin: 50px auto;
    padding: 30px 25px;
    border-radius: 12px;
    background: #fff;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    border-top: 5px solid #f10ade;
    font-family: 'Segoe UI', sans-serif;
}

.demo-container h2 {
    text-align: center;
    color: #f10ade;
    margin-bottom: 25px;
    font-weight: 700;
    font-size: 1.7rem;
}

.demo-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.demo-form label {
    font-weight: 600;
    margin-bottom: 5px;
    color: #333;
}

.demo-form input,
.demo-form textarea {
    padding: 10px 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
    transition: all 0.2s;
}

.demo-form input:focus,
.demo-form textarea:focus {
    border-color: #f10ade;
    box-shadow: 0 0 8px rgba(241,10,222,0.3);
    outline: none;
}

.demo-form button {
    background: #f10ade;
    color: #fff;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    transition: background 0.3s;
}

.demo-form button:hover {
    background: #d509c8;
}

.alert {
    padding: 12px 15px;
    border-radius: 6px;
    font-weight: 500;
    margin-bottom: 20px;
    border-left: 4px solid;
}

.alert.success {
    background: #d4edda;
    color: #155724;
    border-color: #28a745;
}

.alert.error {
    background: #f8d7da;
    color: #721c24;
    border-color: #f10ade;
}
</style>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Live Session</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Optional: Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <h3 class="fw-bold mb-3">Book a Live Google Meet Session</h3>
            <p class="text-muted mb-4">
                Choose your preferred date and time. A Google Meet session will be scheduled for you.
            </p>

            <!-- Success message (optional, JS-controlled later) -->
            <div class="alert alert-success d-none" id="successMsg">
                Live session booked successfully. You’ll be contacted shortly.
            </div>

            <form method="POST" action="{{route('live-session.store')}}">

                @csrf
                <!-- Laravel users: inject CSRF via backend or JS -->
                
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Preferred Date</label>
                    <input type="date" name="date" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Preferred Time</label>
                    <input type="time" name="time" class="form-control" required>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary">
                        Book Live Session
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>

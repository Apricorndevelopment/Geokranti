@extends('userlayouts.layouts')
@section('title', 'Purchase Package 2')
@section('container')

    <div class="container-fluid p-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Purchase Package 2</h4>
            </div>
            @session('success')
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession

            @session('error')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endsession
            <div class="card-body">
                <form action="{{ route('package2.process-purchase') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="package2_id">Select Package</label>
                        <select class="form-control" id="package2_id" name="package2_id" required>
                            <option value="">-- Select Package --</option>
                            @foreach($packages as $package)
                                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3" id="rateSelectBox" style="display: none;">
                        <label for="package2_detail_id">Select Rate Plan</label>
                        <select class="form-control" id="package2_detail_id" name="package2_detail_id" required>
                            <option value="">-- Select Rate --</option>
                        </select>
                    </div>

                    <div class="form-group mb-3" id="quantityBox" style="display: none;">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1" required>
                    </div>

                    <div id="purchaseSummary" class="mt-3 p-3 bg-light rounded" style="display: none;"></div>

                    <button type="submit" class="btn btn-success mt-3" id="confirmButton" style="display: none;">Confirm
                        Purchase</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('package2_id').addEventListener('change', function () {
            const packageId = this.value;
            if (!packageId) {
                document.getElementById('rateSelectBox').style.display = 'none';
                document.getElementById('quantityBox').style.display = 'none';
                document.getElementById('purchaseSummary').style.display = 'none';
                document.getElementById('confirmButton').style.display = 'none';
                return;
            }

            fetch(`/get-package-rates/${packageId}`)
                .then(response => response.json())
                .then(data => {
                    const rateSelect = document.getElementById('package2_detail_id');
                    rateSelect.innerHTML = '<option value="">-- Select Rate --</option>';

                    data.forEach(rate => {
                        const option = document.createElement('option');
                        option.value = rate.id;
                        option.textContent = `Rate: ${rate.rate}% | Time: ${rate.time ?? 0} years | Capital: ${rate.capital}`;
                        option.setAttribute('data-details', JSON.stringify(rate));
                        rateSelect.appendChild(option);
                    });

                    document.getElementById('rateSelectBox').style.display = 'block';
                    document.getElementById('quantityBox').style.display = 'none';
                    document.getElementById('purchaseSummary').style.display = 'none';
                    document.getElementById('confirmButton').style.display = 'none';
                });
        });

        document.getElementById('package2_detail_id').addEventListener('change', function () {
            if (this.value) {
                document.getElementById('quantityBox').style.display = 'block';
                document.getElementById('purchaseSummary').style.display = 'block';
                document.getElementById('confirmButton').style.display = 'block';
                updateSummary();
            } else {
                document.getElementById('quantityBox').style.display = 'none';
                document.getElementById('purchaseSummary').style.display = 'none';
                document.getElementById('confirmButton').style.display = 'none';
            }
        });

        document.getElementById('quantity').addEventListener('input', updateSummary);

        function updateSummary() {
            const quantity = document.getElementById('quantity').value;
            const packageId = document.getElementById('package2_id').value;
            const selectedOption = document.querySelector('#package2_detail_id option:checked');

            if (!packageId || !selectedOption || !quantity) return;

            const rateDetails = JSON.parse(selectedOption.getAttribute('data-details'));

            fetch(`/get-package-price/${packageId}`)
                .then(response => response.json())
                .then(packageData => {
                    const finalPrice = packageData.price * quantity;
                    const profitShareText = rateDetails.profit_share == 1 ? 'Yes' : 'No';

                    document.getElementById('purchaseSummary').innerHTML = `
                        <h6>Purchase Summary</h6>
                        <p><strong>Package:</strong> ${document.querySelector('#package2_id option:checked').text}</p>
                        <p><strong>Rate Plan:</strong> Rate: ${rateDetails.rate}% | Time: ${rateDetails.time} Years</p>
                        <p><strong>Quantity:</strong> ${quantity}</p>
                        <p><strong>Price per unit:</strong> ₹${packageData.price}</p>
                        <p><strong>Total Price:</strong> ₹${finalPrice}</p>
                        <p><strong>Capital:</strong> ${rateDetails.capital ?? '0'}%</p>
                        <p><strong>Profit Share:</strong> ${profitShareText}</p>
                        <p><strong>Your Balance:</strong> ₹${packageData.user_balance}</p>
                        <p class="${finalPrice > packageData.user_balance ? 'text-danger' : 'text-success'}">
                            <strong>Remaining Balance:</strong> ₹${packageData.user_balance - finalPrice}
                        </p>
                    `;
                });
        }
    </script>

@endsection
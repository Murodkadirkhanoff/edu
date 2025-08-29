<x-layouts.instructor.layout>
<div class="db-content">
    <div class="container mb-4">
        <div class="row mb-5">
            <div class="col-12">
                <h1 class="mb-0 h2">Тўловлар тарихи</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- Card -->
                <div class="card mb-4 overflow-hidden">
                    <!-- Card header -->
                    <div class="card-header border-bottom-0">
                        <h3 class="mb-0">Тўловлар тарихи</h3>
                        <p class="mb-0">Барча тўловлар тарихини шу ерда топишингиз мумкин</p>
                    </div>
                    <!-- Table -->
                    <div class="table-invoice table-responsive">
                        <table class="table mb-0 text-nowrap table-centered table-hover">
                            <thead class="table-light">
                            <tr>
                                <th>Буюртма ID си </th>
                                <th>Тўлов санаси</th>
                                <th>Миқдор</th>
                                <th>Холати</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($transactions as $transaction)
                                <tr>
                                    <td><a href="invoice-details.html">#{{$transaction->order_id}}</a></td>
                                    <td> {{\Carbon\Carbon::createFromTimestampMs($transaction->performed_at)->format('Y-m-d H:i:s') }} </td>
                                    <td>{{$transaction->amount}} UZS</td>
                                    <td><span class="badge bg-danger">{{$transaction->provider_state}}</span></td>
                                    <td>
                                        <a href="../assets/images/pdf/invoiceFile.pdf" class="fe fe-download" download></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        🚫 Транзакциялар топилмади
                                    </td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.instructor.layout>

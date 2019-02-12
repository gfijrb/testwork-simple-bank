@extends('layouts.app')


@section('content')
<div class="container col-lg-12">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: #c5892229;">
            <li class="breadcrumb-item"><a href="#" style="color: #2fa360">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Cabinet</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="row">
                <div class="col-lg-12" style="margin-bottom: 1.25rem;">
                    <div class="card">
                        <div class="card-header">Dashboard</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="card">
                                <div class="container card-body">
                                    <form>
                                        <div class="form-group row">
                                            <label for="staticEmail" class="col-sm-2 col-form-label">From</label>
                                            <div class="col-sm-10">
                                                {{--<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="email@example.com">--}}
                                                <input class="form-control" type="text" placeholder="Selected Account" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">To</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword" placeholder="Recipient's address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Amount</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword" placeholder="xxxxxx.xxxx">
                                            </div>
                                        </div>


                                    </form>

                                </div>
                                <div class="container card-header">
                                    <p style="font-family: Consolas">Transactions detail >>>></p>
                                    <a style="font-family: Consolas">>></a>
                                    <a style="font-family: Consolas; color: #2176bd">
                                        FROM:<<span>Selected Account</span>> ->
                                        AMOUNT:<<span>xxx MONEY</span>> ->
                                        TO:<<span>Recipient Account</span>></a>
                                    <a style="font-family: Consolas">;</a>
                                </div>
                                <div class="container card-header">
                                    <p style="font-family: Consolas">Sign transaction >>>></p>
                                    <form class="form-inline">
                                        <div class="form-group mb-2">
                                            <label for="inputPassword" class="col-form-label">PIN-CODE</label>
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="inputPassword2" class="sr-only">Password</label>
                                            <input type="password" class="form-control" id="inputPassword2" placeholder="Your PIN">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Confirm and Send</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="card">
                        <div class="card-header">Accounts</div>
                        <div class="card-body">
                            <a href="#" class="list-group-item list-group-item-action active">
                                0x01
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">0x02</a>
                            <a href="#" class="list-group-item list-group-item-action">0x03</a>
                            <a href="#" class="list-group-item list-group-item-action">0x04</a>
                            <a href="#" class="list-group-item list-group-item-action disabled">0x05</a>
                            <a href="#" class="list-group-item list-group-item-action disabled text-center">
                                <button class="btn col-md-8">+</button>
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="card">
                        <div class="card-header">Transactions</div>

                 {{--       <div class="card-body">
                            <a href="#" class="list-group-item list-group-item-action">0x02</a>
                            <a href="#" class="list-group-item list-group-item-action">0x03</a>
                            <a href="#" class="list-group-item list-group-item-action">0x04</a>

                        </div>--}}
                        <div class="card-body">
                            {{--<div class="input-group">--}}
                                {{--<input class="form-control" type="text" placeholder="fefef484fe6DD454dvva6" readonly>--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<span class="input-group-text">+</span>--}}
                                    {{--<span class="input-group-text">1.0000</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="input-group">--}}
                                {{--<input class="form-control" type="text" placeholder="fpefoekfokokoekfwD445d" readonly>--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<span class="input-group-text">-</span>--}}
                                    {{--<span class="input-group-text">150.0000</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="input-group">--}}
                                {{--<input class="form-control" type="text" placeholder="Evdfeojijo556fwed5erRe" readonly>--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<span class="input-group-text">+</span>--}}
                                    {{--<span class="input-group-text">555.4444</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="text-primary">
                                                <tr>
                                                    <th class="text-center">
                                                        #
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th class="text-right">
                                                        Salary
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr>
                                                    <td class="text-center">
                                                        +
                                                    </td>
                                                    <td>
                                                        Tania Mike
                                                    </td>
                                                    <td class="text-right">
                                                        € 99,225
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                        -
                                                    </td>
                                                    <td>
                                                        John Doe
                                                    </td>
                                                    <td class="text-right">
                                                        € 89,241
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                       +
                                                    </td>
                                                    <td>
                                                        Alexa Mike
                                                    </td>
                                                    <td class="text-right">
                                                        € 49,990
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                        +
                                                    </td>
                                                    <td>
                                                        Jana Monday
                                                    </td>
                                                    <td class="text-right">
                                                        € 49,990
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                        +
                                                    </td>
                                                    <td>
                                                        Paul Dickens
                                                    </td>
                                                    <td class="text-right">
                                                        € 69,201
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="text-center">
                                                        +
                                                    </td>
                                                    <td>
                                                        Manuela Rico
                                                    </td>
                                                    <td class="text-right">
                                                        € 99,201
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

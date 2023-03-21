@extends('api.auth.customers.layouts.main')
@section('content')

<h1><span style="color: white;">Testing Zoho Task</span></h1>

<div class="accordion" id="accordionExample">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <strong>0) Register a Zoho CRM trial account;</strong>
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Done</strong> <img src="{{ asset('done.png') }}" width="18" alt="Done"><br>
                <a href="https://crm.zoho.eu/crm/org20087239750/tab/Home/begin" target="_blank">https://crm.zoho.eu</a> <img src="{{ asset('done.png') }}" width="18" alt="Done">
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <strong>1) Connect via Zoho CRM API;</strong>
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Done</strong> <img src="{{ asset('done.png') }}" width="18" alt="Done"><br>
                <strong>Client Id</strong> - 1000.FMJGRCxxxxxxxxxxxX2KI5OYBE <img src="{{ asset('done.png') }}" width="18" alt="Done"><br>
                <strong>Client Secret</strong> -78d23a1f9xxxxxxxxxxxxxxxxacddee7251cb7 <img src="{{ asset('done.png') }}" width="18" alt="Done"><br>
                <strong>Refresh Token</strong> - 1000.96a1598909xxxxxxxxxxxxxxxx39e.821cbcb972311f029b492d31388040ce <img src="{{ asset('done.png') }}" width="18" alt="Done">
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <strong>2) Create an entry in the Contacts module in Zoho CRM;</strong>
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Done</strong> <img src="{{ asset('done.png') }}" width="18" alt="Done"><br>
                <a href="{{ route('customers.index') }}"><button type="button" class="btn btn-primary">List contacts</button></a>
                <a href="{{ route('customers.create')  }}"><button type="button" class="btn btn-success">Create contact</button></a>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <strong>3) Create an entry in the Deals (Potentials) module associated with an entry in Contacts.</strong>
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <strong>Done</strong> <img src="{{ asset('done.png') }}" width="18" alt="Done"><br>
                <a href="{{ route('deals.index') }}"><button type="button" class="btn btn-primary">List deals</button></a>
                <a href="{{ route('deals.create')  }}"><button type="button" class="btn btn-success">Create deal</button></a>
            </div>
        </div>
    </div>
</div>
@endsection

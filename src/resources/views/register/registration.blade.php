@extends('layout.default')
@section('content')
    <main id="content">
        <header class="page-header page-header--overlapping page-header--short">
            <div class="page-header__block">
                <h1 class="page-header__headline">Registration</h1>
            </div>
        </header>
        <div class="page-section page-section--overlapping page-section--short">
            <div class="page-section__block">
                <form id="registration-form" class="sheet" role="form" method="POST" action="{{ route('register.store') }}">
                    <section class="sheet__section">
                        <div class="sheet__block">
                            <ul>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">Country Code</label>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <select name="country_code" class="input-select" required>
                                            <option value="">--Please select--</option>
                                            @foreach($countryCodes as $codes)
                                                <option value="{{ $codes }}">{{ $codes }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </li>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">Name</label>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <input type="text" name="name" class="input-text" value="" required />
                                    </div>
                                </li>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">Company Name</label>
                                        <p class="label-byline">(Optional)</p>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <input type="text" name="company" class="input-text" value="">
                                    </div>
                                </li>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">Street Name</label>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <input type="text" name="street" class="input-text" value="" required />
                                    </div>
                                </li>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">Street Number</label>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <input type="text" name="street_no" class="input-text" value="" required />
                                    </div>
                                </li>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">Zip code</label>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <input type="text" name="zip_code" class="input-text" value="" required />
                                    </div>
                                </li>
                                <li class="form-stripe">
                                    <div class="form-stripe__label-area">
                                        <label class="label label--left label--has-byline" for="note">City</label>
                                    </div>
                                    <div class="form-stripe__input-area">
                                        <input type="text" name="city" class="input-text" value="" required />
                                    </div>
                                </li>
                                <li class="form-stripe form-stripe--actions">
                                    <div class="form-stripe__secondary-action-area">
                                        <a class="button button--tertiary" href="javascript:void(0);" id="cancel">Cancel</a>
                                    </div>
                                    <div class="form-stripe__primary-action-area">
                                        <button id="saveRegister" type="submit" class="button button--primary">Submit</button>
                                        <br/><div id="response" class="hide" role="alert"></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </main>
@endsection

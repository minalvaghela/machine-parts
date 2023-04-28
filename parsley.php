<!-- /*Below For ParslyLInk*/ -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="\machince&parts\InParsley\parsley.js"></script>
<!-- /* Below For Validation Style */ -->
<style>
input.parsley-success,
select.parsley-success,
textarea.parsley-success {
    color: #468847;
    background-color: #F2F9F0 !important;
    border: 1px solid #D6E9C6;
}

input.parsley-error,
select.parsley-error,
textarea.parsley-error {
    color: #B94A48;
    background-color: #F9F0F0 !important;
    border: 1px solid #f09784;
}

.parsley-errors-list {
    list-style-type: none;
    opacity: 0;
    transition: all .3s ease-in;
    color: red;
    font-size: 13px;
    margin-top: 5px;
    margin-bottom: 0;
    padding-left: 0;
}

.parsley-errors-list.filled {
    opacity: 1;
}

/* for focus changes */
.form-control:focus {
    border-color: #00FF00;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(0, 255, 40, 0.6);
}
</style>
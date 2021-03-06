<template>
    <div style="display: inline;">
        <input type="checkbox" name="tags[]" :value="tag.id" style="display: none;" :checked="checked"/>
        <label style="display:none" :id="'toggleBlind' + tag.id">{{ this.getLabel() }}</label>
        <div :class="getClass()" @click="onClick()" :style="style">
            <div class="toggle-group">
                <label class="btn btn-secondary toggle-on">{{ this.getLabel() }}</label>
                <label class="btn btn-light toggle-off">{{ this.getLabel() }}</label>
                <span class="toggle-handle btn btn-light"></span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                checked: false,
                style: 'width: 100px; height: 2.3rem;',
            }
        },
        props: {
            tag: {
                type: Object,
                required: true,
            },
        },
        mounted: function () {
            let width = $('#toggleBlind' + this.tag.id).outerWidth() + 40;
            this.style = 'width: ' + width + 'px; height: 2.3rem;';
        },
        methods: {
            getClass() {
                return 'toggle btn mb-1 ' + (this.checked ? 'btn-secondary' : 'btn-light off');
            },
            onClick() {
                this.checked = !this.checked;
            },
            getLabel() {
                let regexp =  /^[A-Z] (.*)$/g;
                let matches = regexp.exec(this.tag.name);
                if (matches != null) {
                    return matches[1];
                } else {
                    return this.tag.name;
                }
            }
        },
    }
</script>

<style>
    /*\
    |*| ========================================================================
    |*| Bootstrap Toggle: bootstrap4-toggle.css v3.5.0-beta
    |*| https://gitbrent.github.io/bootstrap-toggle/
    |*| ========================================================================
    |*| Copyright 2018-2019 Brent Ely
    |*| Licensed under MIT
    |*| ========================================================================
    \*/

    /*
    * @added 3.0.0: Return support for "*-xs" removed in Bootstrap-4
    * @see: [Comment](https://github.com/twbs/bootstrap/issues/21881#issuecomment-341972830)
    */
    .btn-group-xs > .btn, .btn-xs {
        padding: .35rem .4rem .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }

    .checkbox label .toggle, .checkbox-inline .toggle {
        margin-left: -1.25rem;
        margin-right: .35rem;
    }

    .toggle {
        position: relative;
        overflow: hidden;
    }

    .toggle.btn.btn-light, .toggle.btn.btn-outline-light {
        /* bootstrap-4 - add a border so toggle is delineated */
        border-color: rgba(0, 0, 0, .15);
    }

    .toggle input[type="checkbox"] {
        display: none;
    }

    .toggle-group {
        position: absolute;
        width: 200%;
        top: 0;
        bottom: 0;
        left: 0;
        transition: left 0.35s;
        -webkit-transition: left 0.35s;
        -moz-user-select: none;
        -webkit-user-select: none;
    }

    .toggle.off .toggle-group {
        left: -100%;
    }

    .toggle-on {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 50%;
        margin: 0;
        border: 0;
        border-radius: 0;
    }

    .toggle-off {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        right: 0;
        margin: 0;
        border: 0;
        border-radius: 0;
        box-shadow: none; /* Bootstrap 4.0 Support via (Issue #186)[https://github.com/minhur/bootstrap-toggle/issues/186]) */
    }

    .toggle-handle {
        position: relative;
        margin: 0 auto;
        padding-top: 0px;
        padding-bottom: 0px;
        height: 100%;
        width: 0px;
        border-width: 0 1px;
        background-color: #fff;
    }

    .toggle.btn-outline-primary .toggle-handle {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .toggle.btn-outline-secondary .toggle-handle {
        background-color: var(--secondary);
        border-color: var(--secondary);
    }

    .toggle.btn-outline-success .toggle-handle {
        background-color: var(--success);
        border-color: var(--success);
    }

    .toggle.btn-outline-danger .toggle-handle {
        background-color: var(--danger);
        border-color: var(--danger);
    }

    .toggle.btn-outline-warning .toggle-handle {
        background-color: var(--warning);
        border-color: var(--warning);
    }

    .toggle.btn-outline-info .toggle-handle {
        background-color: var(--info);
        border-color: var(--info);
    }

    .toggle.btn-outline-light .toggle-handle {
        background-color: var(--light);
        border-color: var(--light);
    }

    .toggle.btn-outline-dark .toggle-handle {
        background-color: var(--dark);
        border-color: var(--dark);
    }

    .toggle[class*="btn-outline"]:hover .toggle-handle {
        background-color: var(--light);
        opacity: 0.5;
    }

    /* NOTE: Must come first, so classes below override as needed */
    /* [default] (bootstrap-4.1.3 - .btn - h:38px) */
    .toggle.btn {
        min-width: 3.7rem;
        min-height: 2.15rem;
    }

    .toggle-on.btn {
        padding-right: 1.5rem;
    }

    .toggle-off.btn {
        padding-left: 1.5rem;
    }

    /* `lg` (bootstrap-4.1.3 - .btn - h:48px) */
    .toggle.btn-lg {
        min-width: 5rem;
        min-height: 2.815rem;
    }

    .toggle-on.btn-lg {
        padding-right: 2rem;
    }

    .toggle-off.btn-lg {
        padding-left: 2rem;
    }

    .toggle-handle.btn-lg {
        width: 2.5rem;
    }

    /* `sm` (bootstrap-4.1.3 - .btn - h:31px) */
    .toggle.btn-sm {
        min-width: 3.125rem;
        min-height: 1.938rem;
    }

    .toggle-on.btn-sm {
        padding-right: 1rem;
    }

    .toggle-off.btn-sm {
        padding-left: 1rem;
    }

    /* `xs` (bootstrap-3.3 - .btn - h:22px) */
    .toggle.btn-xs {
        min-width: 2.19rem;
        min-height: 1.375rem;
    }

    .toggle-on.btn-xs {
        padding-right: .8rem;
    }

    .toggle-off.btn-xs {
        padding-left: .8rem;
    }
</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Projects</div>

                    <div class="card-body">
                        <div id="app">
                            <ul>
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/trackings">Trackings</router-link>
                                </li>
                                <li class="nav-item">
                                    <router-link class="nav-link" to="/projects">Projects</router-link>
                                </li>
                            </ul>
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    import ProjectComponent from "../assets/js/components/ProjectComponent";
    export default {
        components: {ProjectComponent}
    }
</script>

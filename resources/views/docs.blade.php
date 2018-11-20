
<html>
<head>
<link href="http://tombenke.github.io/rest-tool-cookbook/examples/crm-api/docs/stylesheets/screen.css" media="screen, projection" rel="stylesheet" type="text/css" />
<link href="http://tombenke.github.io/rest-tool-cookbook/examples/crm-api/docs/stylesheets/print.css" media="print" rel="stylesheet" type="text/css" />
<!--[if lt IE 8]>
    <link href="stylesheets/ie.css" media="screen, projection" rel="stylesheet" type="text/css" />
<![endif]-->
<script src="http://tombenke.github.io/rest-tool-cookbook/examples/crm-api/docs/js/jquery-1.11.0/jquery-1.11.0.min.js"></script>
<script src="http://tombenke.github.io/rest-tool-cookbook/examples/crm-api/docs/js/restapidoc.js"></script>

</head>
<body class="bp two-col">
<div id="container">



<!-- Begin content -->
<div id="content">

<!-- Begin Service -->
<div class="serviceNameBox">
    <h2>Tadawy API Documentation</h2>
</div>
    <!-- Begin Filters -->
    <div class="serviceNameBox">
        <h2>Filter
            <p>
                <input type="radio" name="type" id="all_radio" value="all" checked>
                <label for="all_radio">All</label>
                <input type="radio" name="type" id="client_radio" value="client">
                <label for="client_radio">Clients</label>
                <input type="radio" name="type" value="company" id="company_radio">
                <label for="company_radio">Companies</label>
            </p>
        </h2>

    </div>
<!-- Begin Methods -->
<div id="methods">
<h3>Methods:</h3>

@foreach( $doc->get('methods') as $method )

<!-- Begin Method -->
<div class="block-container method_div {{ $method['type']  }}" >
    <div id="methodHeader" class="block-title">
        <h3> {{ $method['name'] }} </h3>
        <div class="methodNameBox">
            <div class="method {{ $method['method'] }}-method">{{ $method['method'] }}</div>
        </div>

        <div class="uriTemplateBox">
            <div class="uriTemplate">{{ $method['url'] }}</div>
        </div>
    </div>
    <div id="method">
        <p>{{ $method['description'] }}</p>

        <!-- Begin Request -->
        <div class="shady-block-container">
            <div class="block-title">
                <h4>Request:</4>
            </div>
            <div id="request">

                <!-- Begin Headers -->
                <div class="block-container">
                    <div class="block-title">
                        <h5>Headers:

                        </h5>
                    </div>
                    <div id="headers">
                    <table>
                        @foreach( $doc->get('headers')+$method['headers'] as $key => $header )
                        <tr>
                            <th> {{ $key }} </th>
                            <th> {{ $header }} </th>
                        </tr>
                        @endforeach
                    </table>
                    </div>
                </div>
                <!-- End of Headers -->


                <div class="block-container">
                    <div class="block-title">
                        <h5>Parameters:

                            <span class="notDefined"></span>

                        </h5>
                    </div>
                    <div id="parameters">
                        <table>
                            <tr>
                                <th>Parameter</th>
                                <th>Type</th>
                                <th>Rules</th>
                            </tr>
                            @foreach( $method['parameters'] as $parameter )
                            <tr>
                                <td> {{ $parameter['name'] }} </td>
                                <td> {{ $parameter['type'] }} </td>
                                <td> {{ $parameter['validation'] }} </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Request -->


        <!-- Begin Responses -->
        <div class="shady-block-container">
            <div class="block-title">
                <h4>Responses:</h4>
            </div>
            <div id="responses">

                @foreach( $method['responses'] as $response )
                <!-- Begin Response -->
                <div class="block-container">
                    <div class="block-title">
                        <h5> {{ $response['code'] }} </h5>
                    </div>
                    <div id="response">
                        <!-- Begin Body -->
                        <div class="block-container">
                            <div class="block-title">
                                <h5>Body:

                                </h5>
                            </div>
                            <div id="headers">

                                    <?php
                                    if( is_array( $response['data'] ) )
                                        dump(json_decode(json_encode($response['data'])));
                                    else
                                        dump(json_decode($response['data']));
                                    ?>
                                    @if(!empty($response['comment']))
                                        <p> {{ $response['comment'] }} </p>
                                    @endif
                            </div>
                        </div>
                        <!-- End of Body -->
                    </div>
                </div>
                <!-- End of Response -->
                @endforeach
            </div>
        </div>
        <!-- End of Responses -->
    </div>
</div>
<!-- End of Method -->
@endforeach

</div>
<!-- End of methods -->
<!-- End of Service -->

</div>
<!-- End of content -->

    <script>
        $("input[name=type]").change(function(){
            $(".method_div").hide();
            value = $(this).val();
            if(value == 'all'){
                $(".method_div").fadeIn('fast');
            }else{
                $("."+$(this).val()+' , .all').fadeIn('fast');
            }

        });
    </script>


</div>
<!-- End of container -->
</body>
</html>
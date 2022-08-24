<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Search Demo</title>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <style>
            h2 {
                color: white;
            }
        </style>
    </head>

    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:pt-0">
            <div class="max-w-6xl w-full mx-auto sm:px-6 lg:px-8 sm:py-6 lg:py-8">
                <form>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="col-md-8">
                            
                            <input hint = "Search" value="{{ $term }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="term" name="term" type="text">
                            
                        </div>
                        <div class="col-md-2 ">
                                <select id="citysearch" name="citysearch" onchange="this.form.submit()" class="citysearch form-control p-4" >
                                @if ($city_id) > 0)
                                    <option selected value="{{ $city_id }}">{{ $city_name }}</option>
                                @endif
                                </select>
                        </div>
                        
                    </div>
                </form>
                @if (count($results) == 0 )
                    <b>No result found.</b>
                @endif
                <table class="table-auto w-full mb-6">
                    <tbody>
                        @foreach($results as $result)
                            <x-dynamic-component
                                :component="class_basename($result)"
                                :data="$result"
                                :class="$loop->even ? 'bg-gray-200' : ''" />
                        @endforeach
                    </tbody>
                </table>

                {!! $results->withQueryString()->links() !!}
            </div>
        </div>
    </body>
    <script type="text/javascript">
    $('.citysearch').select2({
        placeholder: 'Select city',
        ajax: {
            url: '/cities',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.name,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
    </script>
</html>
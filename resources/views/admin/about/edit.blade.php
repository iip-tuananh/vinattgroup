@extends('layouts.main')

@section('css')
@endsection

@section('title')
    Edit about us
@endsection

@section('page_title')
    Edit about us
@endsection

@section('content')
    <div ng-controller="EditAbout" ng-cloak>
        @include('admin.about.form')
    </div>
@endsection
@section('script')
    @include('admin.about.About')
    <script>
        app.controller('EditAbout', function($scope, $http) {
            $scope.form = new About(@json($about), {
                scope: $scope
            });
            $scope.loading = {};

            $scope.submit = function() {
                $scope.loading.submit = true;
                let data = $scope.form.submit_data;
                $.ajax({
                    type: 'POST',
                    url: "/admin/about/" + "{{ $about->id }}" + "/update",
                    headers: {
                        'X-CSRF-TOKEN': CSRF_TOKEN
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                            $scope.errors = {};
                        } else {
                            toastr.warning(response.message);
                            $scope.errors = response.errors;
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    }
                });
            }
            @include('admin.about.formJs');
        });
    </script>
@endsection

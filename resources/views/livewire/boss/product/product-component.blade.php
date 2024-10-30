<div>
    <div class="p-4">

        @include('livewire.content-header')
        <div class="card  mt-2">
            @include('livewire.card-header')
{{--            create start--}}
            @if(isset($create) && $create==1)
                @include('livewire.boss.product.create')
                @include('livewire.show')
            @endif
{{--            create end--}}
{{--            update start--}}
            @if(isset($update) && $update==1)
                @include('livewire.boss.product.update')
                @include('livewire.show')
            @endif
{{--            update end--}}
{{--             delete start --}}
            @if(isset($delete) && $delete==1)
                @include('livewire.delete-message')
                @include('livewire.show')
            @endif
{{--            delete end--}}
{{--            view start--}}
            @if(isset($view) && $view==1)
                @include('livewire.boss.product.show')
                @include('livewire.show')
            @endif
{{--            view end--}}

            <div class="card-body">
                <table class="table table-bordered table-striped table-responsive-lg">
                    @include('livewire.thead')
                    <tbody>
                    @if(isset($models))
                        @foreach($models as $model)
                            <tr>
                                <td>{{$model->id}}</td>
                                <td>{{$model->name}}</td>
                                <td style="text-transform: none">{{$model->price}} so'm  </td>
                                <td>{{$model->sale_price == null ? '----' : $model->sale_price}} so'm </td>
                                <td>{{$model->discount_price == null ? '----' : $model->discount_price}} so'm  </td>
                                <td style="text-transform: none">{{$model->count}}</td>
                                <td><button style="background-color: {{$model->color}};border:none;outline:none;width: 20px;height: 20px;"></button></td>
                                <td><button class="btn btn-sm btn-{{$model->status == 'active'?'success':'warning'}}" wire:click="statusEdit({{$model->id}})">{{$model->status}}</button></td>
                                <td class="d-flex" style="gap: 3px;flex-wrap: wrap;">
                                    <button class="btn btn-outline-warning btn-sm" wire:click="updateWindow({{$model->id}})"><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-outline-primary btn-sm" wire:click="showWindow({{$model->id}})"><i class="fa fa-eye"></i></button>
                                    <div wire:ignore>
                                        @livewire('boss.product.sale-component', ['id' => $model->id])
                                    </div>
                                    <div wire:ignore>
                                        @livewire('boss.product.discount-component' , ['id'=>$model->id])
                                    </div>
                                    <br> <button class="btn btn-outline-success btn-sm" wire:click="updateWindow({{$model->id}})">Sotish</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" wire:click="deleteWin({{$model->id}})"><i class="fa fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                @if(isset($users))
                    {{$users->links()}}
                @endif
            </div>
        </div>
    </div>
</div>

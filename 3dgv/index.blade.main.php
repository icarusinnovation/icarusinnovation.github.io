@extends('layouts.app')
@section('content')
<section id="cart" class=" ">

            <div class="intro column is-10 is-offset-1">
                <h2 class="title valji-title is-center" style="">Cart </h2>

                <div class="valji-title-border is-center" style="max-width:180px;"></div>
                <form name="cart" method="post" class="is-desktop" action="{{route('post-cart')}}">
                <div class="grid-container has-text-center" style="margin-top:30px;">
                    <table class="table is-bordered is-fullwidth " cellspacing="5">
                      <thead>
                        <tr>
                          <th> IMAGE </th>
                          <th> CATALOGUE NAME </th>
                          <th> PRODUCT NAME </th>
                          <th> QUANTITY </th>
                        </tr>
                      </thead>
                      <tbody>
                          @if(\Cart::isEmpty())
                        <tr>
                          <td colspan="4" class="has-text-centered"> NO ITEMS IN CART.</td>
                        </tr>
                        @else
                        @foreach($cart as $item)
                        <tr data-item="{{$item->id}}" class="valji-cart-item">
                          <td class="has-text-centered"> <img class="cart-item-image" src="{{ Storage::disk('public')->url($item->product_image) }}" ></td>
                           <td class="has-text-centered" width="250px"> @if($item->product_catalogue)
                               {{ $item->product_catalogue->catalogue_name }}
                               @else
                               {{ $item->product_category->category_name }}
                               @endif
                            </td>
                            <td class="has-text-centered" width="250px">
                               {{ $item->product_name }}
                            </td>
                             <td class="has-text-centered">
                                 <p onClick="remove({{$item->id}})" >Delete <span class="fa fa-remove"></span></p>
                                 <span class="qty-edit minus" onClick="minus({{$item->id}},{{$item->quantity}})">-</span>
                               <input readonly type="number" value="{{ $item->quantity }}" name="cart[item_{{$item->id}}]" class="qty-box" data-product="{{$item->id}}">
                               <span class="qty-edit  plus" onClick="plus({{$item->id}},{{$item->quantity}})">+</span>
                               <p style="top: 70px;
right: -80px;
cursor: pointer;
color: #d7222e;
border: 1px solid #d7222e;
padding: 5px;
border-radius: 17px;">See in 3D</p>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                    
                    
                    {{ csrf_field() }}

                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                        @if(Cart::isEmpty())
                            <button class="button valji-button" value="update" name="act" disabled>
                                Update Cart
                            </button>
                        @else
                        <button class="button valji-button" value="update" name="act">
                                Update Cart
                            </button>
                        @endif
                        </p>
                        <p class="control">
                        @if(Cart::isEmpty())
                        <button class="button valji-button" value="submit" name="act" disabled>
                            Submit Enquiry</button>
                            @else
                            <button class="button valji-button" value="submit" name="act">
                            Submit Enquiry</button>
                        @endif
                        </p>
                        </div>
                </div>
            </form>
            
            <!--Mobile Form-->
            <form name="cart" method="post" class="is-mobile" action="{{route('post-cart')}}">
                <div class="grid-container has-text-center mobile-cart-container" style="margin-top:30px;">
                    
                    @if(\Cart::isEmpty())
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="card" style="padding:50px 0px;>
                          <div class="card-body">
                            <p class="card-text has-text-centered">NO ITEMS IN CART.</p>
                            
                          </div>
                        </div>
                      </div>
                    @else
                        @foreach($cart as $item)
                        <div class="card valji-cart-item" data-item="{{$item->id}}">
                          <div class="card-image">
                            <figure class="image is-4by3">
                              <img src="{{ Storage::disk('public')->url($item->product_image) }}" alt="{{$item->product_name}}">
                            </figure>
                          </div>
                          <div class="card-content">
                            <div class="media">
                              <div class="media-content has-text-centered">
                                <p class="title is-size-6"> {{ $item->product_name }}</p>
                                <p class="subtitle is-size-7">
                                    @if($item->product_catalogue)
                               {{ $item->product_catalogue->catalogue_name }}
                               @else
                               {{ $item->product_category->category_name }}
                               @endif</p>
                              </div>
                            </div>
                        
                            <div class="content">
                               <span class="qty-edit minus" onClick="minus({{$item->id}},{{$item->quantity}})">-</span>
                               <input readonly type="number" value="{{ $item->quantity }}" name="cart[item_{{$item->id}}]" class="qty-box" data-product="{{$item->id}}">
                               <span class="qty-edit  plus" onClick="plus({{$item->id}},{{$item->quantity}})">+</span>
                               <div class="columns is-mobile" style="margin-top:10px;">
                                    <div class="column is-half-mobile"><p onClick="remove({{$item->id}})" class="button is-outlined is-danger">Delete <span class="fa fa-remove"></span></p></div>
                                    <div class="column is-half-mobile"><p style="
cursor: pointer;
color: #d7222e;" class="button is-outlined is-danger">See in 3D</p></div>
                               
                               
                            </div>
                          </div>
                        </div>
                        </div>
                        @endforeach
                    @endif
                    
                  
                    
                    {{ csrf_field() }}

                    <div class="field is-grouped is-grouped-centered">
                        <p class="control">
                        @if(Cart::isEmpty())
                            <button class="button valji-button" value="update" name="act" disabled>
                                Update Cart
                            </button>
                        @else
                        <button class="button valji-button" value="update" name="act">
                                Update Cart
                            </button>
                        @endif
                        </p>
                        <p class="control">
                        @if(Cart::isEmpty())
                        <button class="button valji-button" value="submit" name="act" disabled>
                            Submit Enquiry</button>
                            @else
                            <button class="button valji-button" value="submit" name="act">
                            Submit Enquiry</button>
                        @endif
                        </p>
                        </div>
                </div>
            </form>

            </div>
</section>
@endsection

<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists\Components\Card;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\Grid;
use Illuminate\Database\Eloquent\Builder;


class ViewTransaction extends ViewRecord
{
    protected static string $resource = TransactionResource::class;
    public static function getRecordQuery(): Builder
{
    return parent::getRecordQuery()->with('transactionDetails.product');
}


    public function infolist(Infolist $infolist): Infolist
    {
        // dd($this->record->transactionDetails);
        return $infolist
            ->schema([

                // General Information
                Card::make([
                    TextEntry::make('invoice')->label('Invoice'),
                    TextEntry::make('status')
                        ->badge()
                        ->color(fn (string $state): string => match ($state) {
                            'pending' => 'warning',
                            'success' => 'success',
                            'expired' => 'gray',
                            'failed' => 'danger',
                        }),
                    TextEntry::make('created_at')->label('Di Pesan'),
                ])->columns(3),

                // Customer Information
                Card::make([
                    TextEntry::make('customer.name')->label('Nama Pelanggan'),
                    TextEntry::make('customer.email')->label('Alamat Email'),
                    TextEntry::make('customer.no_hp')->label('Nomor HP'),
                    TextEntry::make('address')->label('Alamat'),
                ])->columns(3),

                // Ongkos Kirim
                Card::make([
                    TextEntry::make('shipping.shipping_courier')->label('Jasa Kirim'),
                    TextEntry::make('shipping.shipping_service')->label('Layanan Kirim'),
                    TextEntry::make('shipping.shipping_cost')->label('Ongkos Kirim')->numeric(decimalPlaces: 0)->money('IDR', locale: 'id'),
                ])->columns(3),

                // Transaction Details
                Card::make([
                    RepeatableEntry::make('TransactionDetails')
                        ->label('Items Details')
                        ->schema([
                            ImageEntry::make('product.image')->label('Foto Produk')->circular()->width(100)->height(100),
                            TextEntry::make('product.title')->label('Nama Produk'),
                            TextEntry::make('qty')->label('Quantity'),
                            TextEntry::make('price')->label('Harga')->numeric(decimalPlaces: 0)->money('IDR', locale: 'id'),
                        ])

                        ->columns(4),
                ]),

                Card::make([
                    // Buat container grid untuk alignment
                    Grid::make(1)
                        ->schema([
                            TextEntry::make('total')
                                ->label('Total Harga')
                                ->numeric(decimalPlaces: 0)
                                ->money('IDR', locale: 'id')
                                ->size(TextEntry\TextEntrySize::Large)
                                ->color('primary')
                                ->alignEnd() // Align konten ke kanan
                        ])
                ])
            ]);
    }


}

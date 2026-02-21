<?php

namespace App\Filament\Pages;

use App\Models\Page as PageModel;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Panel;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Storage;

class EditAboutPage extends Page
{
    use InteractsWithFormActions;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'О компании';

    protected static ?int $navigationSort = 2;

    public ?array $data = [];

    public ?PageModel $page = null;

    public static function getRelativeRouteName(Panel $panel): string
    {
        return 'about';
    }

    public function mount(): void
    {
        $this->page = PageModel::firstOrCreate(
            ['slug' => 'about'],
            [
                'title' => 'О компании',
                'meta_description' => 'О компании — клининг в Кирове',
                'blocks' => [],
                'sort_order' => 10,
                'is_active' => true,
            ]
        );
        $blocks = $this->page->blocks ?? [];
        $whoWeAre = $blocks['who_we_are'] ?? [];
        $items = $whoWeAre['items'] ?? [
            ['title' => 'Клининг полного цикла', 'description' => 'Работаем в Кирове с коммерческими и частными клиентами. От пола внутри до фасада снаружи — регулярная уборка, мойка остекления, химчистка ковров и мебели, грязезащитные покрытия. Весь город в зоне досягаемости.'],
            ['title' => 'Без субподрядчиков', 'description' => 'Собственные бригады и техника. Цех по стирке ковров, производство и обслуживание входных ковров, оборудование для мойки фасадов до 16 м. Закрываем клининг под ключ — один подрядчик, предсказуемый результат.'],
            ['title' => 'Работаем в Кирове', 'description' => 'ул. Романа Ердякова 50 стр 2. Обслуживаем торговые центры, офисы, БЦ, квартиры — весь город в зоне досягаемости. Индивидуальный подход, долгосрочные договоры.'],
        ];
        $this->form->fill([
            'title' => $this->page->title,
            'meta_description' => $this->page->meta_description,
            'hero_intro_1' => $blocks['hero_intro_1'] ?? 'Клининговая компания полного цикла в Кирове. Работаем с коммерческими и частными клиентами — от регулярной уборки до мойки фасадов и химчистки.',
            'hero_intro_2' => $blocks['hero_intro_2'] ?? 'Собственные мощности, без субподрядчиков. Адрес: ул. Романа Ердякова 50 стр 2.',
            'who_we_are_title' => $whoWeAre['title'] ?? 'Кто мы',
            'who_we_are_items' => $items,
            'image' => isset($blocks['image']) ? [$blocks['image']] : null,
        ]);
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getFormContentComponent(),
            ]);
    }

    protected function getFormContentComponent(): Component
    {
        return Form::make([EmbeddedSchema::make('form')])
            ->id('form')
            ->livewireSubmitHandler('save')
            ->footer([
                Actions::make($this->getFormActions())
                    ->alignment('start')
                    ->key('form-actions'),
            ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Сохранить')
                ->submit('save')
                ->keyBindings(['mod+s']),
        ];
    }

    public function defaultForm(Schema $schema): Schema
    {
        return $schema
            ->operation('edit')
            ->statePath('data');
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Основное')->schema([
                    TextInput::make('title')
                        ->label('Заголовок страницы')
                        ->required()
                        ->maxLength(255),
                    TextInput::make('meta_description')
                        ->label('Описание для поисковиков')
                        ->maxLength(255)
                        ->columnSpanFull(),
                ]),
                Section::make('Синий блок (под заголовком)')->schema([
                    Textarea::make('hero_intro_1')
                        ->label('Первый абзац')
                        ->rows(2)
                        ->columnSpanFull(),
                    Textarea::make('hero_intro_2')
                        ->label('Второй абзац')
                        ->rows(2)
                        ->columnSpanFull(),
                ]),
                Section::make('Фото')->schema([
                    FileUpload::make('image')
                        ->label('Фото на страницу')
                        ->image()
                        ->disk('public')
                        ->directory('about')
                        ->visibility('public')
                        ->fetchFileInformation(false)
                        ->deleteUploadedFileUsing(function ($file): void {
                            if (is_string($file)) {
                                Storage::disk('public')->delete($file);
                            }
                        })
                        ->columnSpanFull(),
                ]),
                Section::make('Блок «Кто мы»')->schema([
                    TextInput::make('who_we_are_title')
                        ->label('Заголовок секции')
                        ->maxLength(255),
                    Repeater::make('who_we_are_items')
                        ->label('Пункты (заголовок + описание)')
                        ->schema([
                            TextInput::make('title')->label('Заголовок')->required(),
                            Textarea::make('description')->label('Описание')->rows(3)->required(),
                        ])
                        ->defaultItems(0)
                        ->columnSpanFull(),
                ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $image = $data['image'] ?? null;
        $imagePath = is_array($image) ? ($image[0] ?? null) : $image;
        $blocks = [
            'hero_intro_1' => $data['hero_intro_1'] ?? '',
            'hero_intro_2' => $data['hero_intro_2'] ?? '',
            'image' => $imagePath,
            'who_we_are' => [
                'title' => $data['who_we_are_title'] ?? 'Кто мы',
                'items' => $data['who_we_are_items'] ?? [],
            ],
        ];
        $this->page->update([
            'title' => $data['title'],
            'meta_description' => $data['meta_description'] ?? '',
            'blocks' => array_merge($this->page->blocks ?? [], $blocks),
        ]);

        Notification::make()
            ->success()
            ->title('Сохранено')
            ->send();
    }

    public function getTitle(): string | Htmlable
    {
        return 'О компании';
    }
}

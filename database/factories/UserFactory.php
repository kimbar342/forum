<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->array_name(),
            'last_name'=>$this->array_last_name(),
            'surname' => $this->array_surname(),
            'avatar' =>'human.png',
            'email' => 'admin@admin.ru',
                //fake()->unique()->safeEmail(),
            'active' => 1,
               // $this->active(),
            'root' => 1,
              //  $this->root(),
            'post' => $this->post(),
            'gender' => 'man',
            'city' => 'Москва',
            'birthday' => date('Y-m-d'),
            'familyPost' => 'холост',
            'position_in_office' => $this->position_in_office(),
            'experience' => '10',
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    protected function post(){
     $arr_post = array('Директор','Зам.директора','Директор по развитию','Финансовый директор','Главный юрист',
         'Специалист по претензиям',
         'Главный бухгалтер',
         'Бухгалтер по кадрам',
         'Делопроизводитель',
         'Менеджер',
         'Логист',
         'Механик',
         'Водитель ам',
         'Начальник склада',
         'Кладовщик',
         'Грузчик',
         'Водитель погрузчика'
         );
     $value = array_rand($arr_post,1);
     return $arr_post[$value];
    }

    protected function root()
    {
        $arr_root = array(true,false,);
        $value = array_rand($arr_root, 1);
        return $arr_root[$value];
    }

    protected function active()
    {
        $arr_active = array(true,false,);
        $value = array_rand($arr_active, 1);
        return $arr_active[$value];
    }

    protected function position_in_office(){
        $position_in_office = array('Находится на рабочем месте','В командировке','На больничном','В декрете',);

        $value = array_rand($position_in_office,1);
        return $position_in_office[$value];
    }

    protected function array_name(){
        $array_name = array('Аделаида',
            'Аделина',
            'Аделия',
            'Адель',
            'Адельфина',
            'Адиля',
            'Адис',
            'Адольф',
            'Адриан',
            'Адриана',
            'Адриенна',
            'Аза',
            'Азалия',
            'Азамат',
        );

        $value = array_rand($array_name,1);
        return $array_name[$value];
    }

    protected function array_last_name(){
        $array_last_name = array('Смирнов',
            'Иванов',
            'Кузнецов',
            'Соколов',
            'Попов',
            'Лебедев',
            'Козлов',
            'Новиков',
            'Морозов',
            'Петров',
            'Волков',
            'Соловьёв',
            'Васильев',
            'Зайцев',
            'Павлов',
            'Семёнов',
            'Голубев',
            'Виноградов',
            'Богданов',
            'Воробьёв',
            'Фёдоров',
            'Михайлов',
            'Беляев',
            'Тарасов',
            'Белов',
            'Комаров',
            'Орлов',
            'Киселёв',);
        $value = array_rand($array_last_name,1);
        return $array_last_name[$value];
    }

    protected function array_surname(){
        $array_surname = array('Ааронович',
            'Абрамович',
            'Августович',
            'Авдеевич',
            'Аверьянович',
            'Адамович',
            'Адрианович',
            'Акимович',
            'Аксёнович',
            'Александрович',
            'Алексеевич',
            'Анатольевич',
            'Андреевич',
            'Андроникович',
            'Анисимович',
            'Антипович',
            'Антонович',
            'Ануфриевич',
            'Аркадьевич',
            'Арсенович',
            'Арсеньевич',
            'Артёмович',
            'Артемьевич',
            'Артурович',
            'Архипович',
            'Афанасьевич',
            'Ахматович',);
        $value = array_rand($array_surname,1);
        return $array_surname[$value];
    }
}





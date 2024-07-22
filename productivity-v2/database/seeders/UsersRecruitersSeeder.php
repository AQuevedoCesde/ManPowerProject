<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersRecruitersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array("name" => "Yuli Alexandra Amador Gonzalez", "email" => "yuli.amador@manpower.com.co"),
            array("name" => "Martha Elena Paguay Escobar", "email" => "martha.paguay@manpower.com.co"),
            array("name" => "Sandra Catalina Ocampo Tangarife", "email" => "sandra.ocampo@manpowergroup.com.co"),
            array("name" => "Yuli Paola Ramos Ospina", "email" => "yuli.ramos@manpower.com.co"),
            array("name" => "Yineth Alexandra Rojas Vasquez", "email" => "alexandra.rojas@manpower.com.co"),
            array("name" => "Viviana Carolina Cifuentes Sandoval", "email" => "viviana.cifuentes@manpower.com.co"),
            array("name" => "Maida Viviana Genes Suarez", "email" => "viviana.genes@manpower.com.co"),
            array("name" => "Angie Kateherine Perez Barrios", "email" => "angie.perez@manpower.com.co"),
            array("name" => "Blanca Luz Martinez Lozano", "email" => "blanca.martinez@manpower.com.co"),
            array("name" => "Carlos Mario Avila Moya", "email" => "carlos.avila@manpower.com.co"),
            array("name" => "Luisa Fernanda Bonilla Cardona", "email" => "fernanda.bonilla@manpower.com.co"),
            array("name" => "Cristian David Zapata Zapata", "email" => "cristian.zapata@manpowergroup.com.co"),
            array("name" => "Lenis Giseth Arias Fonseca", "email" => "lenis.arias@manpower.com.co"),
            array("name" => "Sara Natalia Hurtado Correa", "email" => "saran.hurtado@manpower.com.co"),
            array("name" => "Francy Viviana Villalobos Amaya", "email" => "francy.villalobos@manpower.com.co"),
            array("name" => "Valentina Acuna Pastran", "email" => "valentina.acuna@manpower.com.co"),
            array("name" => "Daniela Medina Ruiz", "email" => "daniela.medina@manpower.com.co"),
            array("name" => "Angie Alejandra Montano Quintero", "email" => "angie.montano@manpower.com.co"),
            array("name" => "Yennifer Rivera Munoz", "email" => "yennifer.rivera@manpower.com.co"),
            array("name" => "Valentina Echeverri Arango", "email" => "valentina.echeverri@manpower.com.co"),
            array("name" => "Luz Enith Munoz Ayazo", "email" => "luz.munoz@manpower.com.co"),
            array("name" => "Jaider Esteban Ramirez Martinez", "email" => "jaider.ramirez@manpower.com.co"),
            array("name" => "Johana Ivonne Tovar Quintero", "email" => "johana.tovar@manpower.com.co"),
            array("name" => "Luisa Fernanda Barona Montesdeoca", "email" => "luisa.barona@manpower.com.co"),
            array("name" => "Deissy Johanna Baron Umbarila", "email" => "deissy.baron@manpower.com.co"),
            array("name" => "Angie Carolina Perez Palacio", "email" => "carolina.perez@manpower.com.co"),
            array("name" => "Diana Carolina Alvarez Cipacon", "email" => "carolina.alvarez@manpower.com.co"),
            array("name" => "Sergio Andres Ardila Ortiz", "email" => "sergio.ardila@manpower.com.co"),
            array("name" => "Angelica Jhohana Cruz Gonzalez", "email" => "angelicaj.cruz@manpower.com.co"),
            array("name" => "Andrea Ballen Bonilla", "email" => "andrea.ballen@manpower.com.co"),
            array("name" => "Oscar Daniel Sulbara Buitrago", "email" => "oscar.sulbara@manpower.com.co"),
            array("name" => "Nubia Angelica Vega Bermudez", "email" => "nubia.vega@manpower.com.co"),
            array("name" => "Joseph Julian Rodriguez Colmenares", "email" => "joseph.rodriguez@manpower.com.co"),
            array("name" => "July Vanessa Higuera Castano", "email" => "july.higuera@manpower.com.co"),
            array("name" => "Ivonne Romero Ramos", "email" => "ivonne.romero@manpower.com.co"),
            array("name" => "Nancy Orozco Cardona", "email" => "nancy.orozco@manpower.com.co"),
            array("name" => "Cindy Julieth Ortiz Ortiz", "email" => "cindy.ortiz@manpower.com.co"),
            array("name" => "Juliana Gomez Hernandez", "email" => "juliana.gomez@manpower.com.co"),
            array("name" => "Karla Gisela Buritica Hoyos", "email" => "karla.buritica@manpower.com.co"),
            array("name" => "Valentina Arbelaes Lopez", "email" => "valentina.arbelaez@manpowergroup.com.co"),
            array("name" => "Laura Vanessa Montoya Gavira", "email" => "laura.montoya@manpower.com.co"),
            array("name" => "Viviana Carolina Manrique Bahamon", "email" => "viviana.manrique@manpower.com.co"),
            array("name" => "Karol Stefanny Mendieta Trujillo", "email" => "karol.mendieta@manpower.com.co"),
            array("name" => "Valentina Arboleda Mazo", "email" => "valentina.arboleda@manpower.com.co"),
            array("name" => "Viviana Andrea Giraldo Giraldo", "email" => "viviana.giraldo@manpower.com.co"),
            array("name" => "Martha Liliana Poveda Lopez", "email" => "liliana.poveda@manpower.com.co"),
            array("name" => "Diana Carolina Cortes Santana", "email" => "diana.cortes@manpower.com.co"),
            array("name" => "Carlos Mario Cardona Sepulveda", "email" => "carlos.cardona@manpower.com.co"),
            array("name" => "Sindy Johana Lombana Palma", "email" => "sindy.lombana@manpower.com.co"),
            array("name" => "Sirleny Vaca Peralta", "email" => "sirleny.vaca@manpower.com.co"),
            array("name" => "Jennifert Daniela Bello Bello", "email" => "jennifert.bello@manpower.com.co"),
            array("name" => "Leydi Paola Murillo Forero", "email" => "leydi.murillo@manpowergroup.com.co"),
            array("name" => "Mayra Alejandra Ramirez Bernal", "email" => "mayra.ramirez@manpower.com.co"),
            array("name" => "Leidy Tatiana Perez Alzate", "email" => "leidy.perez@manpower.com.co"),
            array("name" => "Carolina Garcia Ortegon", "email" => "carolina.garcia@manpower.com.co"),
            array("name" => "Joan Stiven Linares Navarrete", "email" => "joan.linares@manpowergroup.com.co"),
            array("name" => "Karen Dayana Garcia Mora", "email" => "karen.garcia@manpower.com.co"),
            array("name" => "Yury Maricela Yepes Acosta", "email" => "yury.yepes@manpower.com.co"),
            array("name" => "Maria Camila Lezcano Tejeda", "email" => "maria.lezcano@manpower.com.co"),
            array("name" => "Jordan Fabian Cardozo Mosquera", "email" => "jordan.cardozo@manpower.com.co"),
            array("name" => "Johnatan Eduardo Gonzalez Gamboa", "email" => "johnatan.gonzalez@manpower.com.co"),
            array("name" => "Luz Aydee Capera Rodriguez", "email" => "luz.capera@manpower.com.co"),
            array("name" => "Nicolay Potier Bayona", "email" => "nicolay.potier@manpower.com.co"),
            array("name" => "Elio David Gamarra Florez", "email" => "elio.gamarra@manpower.com.co"),
            array("name" => "Laura Lorena Sanchez Valbuena", "email" => "laura.sanchez@manpower.com.co"),
            array("name" => "Daniela Andrea Montoya Munoz", "email" => "daniela.montoya@manpower.com.co"),
            array("name" => "Angie Milena Duque Guzman", "email" => "angie.duque@manpower.com.co"),
            array("name" => "Leidy Tatiana Gil Vallejo", "email" => "leidy.gil@manpower.com.co"),
            array("name" => "Luisa Fernanda Palacio Ospina", "email" => "fernanda.palacio@manpower.com.co"),
            array("name" => "Neyira Isabel Polo Ahumada", "email" => "isabel.polo@manpower.com.co"),
            array("name" => "Julieth Viviana Suarez Virviescas", "email" => "julieth.suarez@manpower.com.co"),
            array("name" => "Maria Fernanda Giraldo Vargas", "email" => "maria.giraldo@manpower.com.co"),
            array("name" => "Vanesa Herrera Corredor", "email" => "vanesa.herrera@manpower.com.co"),
            array("name" => "Katerine Castrillon Agudelo", "email" => "katerine.castrillon@manpower.com.co"),
            array("name" => "Carolina Cruz Camargo", "email" => "carolina.cruz@manpower.com.co"),
            array("name" => "Harold Yesid Rosas Gutierrez", "email" => "harold.rosas@manpower.com.co"),
            array("name" => "Ana Carolina Mendoza Girado", "email" => "ana.mendoza@manpower.com.co"),
            array("name" => "Yesica Alejandra Lizarazo Herrera", "email" => "yesica.lizarazo@manpower.com.co"),
            array("name" => "Laura Camila Gonzalez Rodriguez", "email" => "laura.gonzalez@manpower.com.co"),
            array("name" => "Maria Alejandra Pardo Pedraza", "email" => "alejandra.pardo@manpower.com.co"),
            array("name" => "Diana Paola Rincon Benitez", "email" => "diana.rincon@manpower.com.co"),
            array("name" => "Ciro Andres Gutierrez Bernal", "email" => "ciro.gutierrez@manpower.com.co"),
            array("name" => "Lina Maria Lazaro Escobar", "email" => "lina.lazaro@manpower.com.co"),
            array("name" => "Leidy Diviana Hernandez Chacon", "email" => "leidy.hernandez@manpower.com.co"),
            array("name" => "Miguel Andres Parrado Sanchez", "email" => "miguel.parrado@manpower.com.co"),
            array("name" => "Maria Camila Portocarrero Banol", "email" => "maria.portocarrero@manpower.com.co"),
            array("name" => "Maribel Ortiz Carmona", "email" => "maribel.ortiz@manpower.com.co"),
            array("name" => "Belkys Paola Orozco Barragan", "email" => "belkys.orozco@manpower.com.co"),
            array("name" => "Jorge Humberto Ospina Jaramillo", "email" => "jorgeh.ospina@manpower.com.co"),
            array("name" => "Sharon Alanice Quintero Calero", "email" => "sharon.quintero@manpower.com.co"),
            array("name" => "Melissa Sandoval Moreno", "email" => "melissa.sandoval@manpower.com.co"),
            array("name" => "Yazmin Davinia Galindez Acosta", "email" => "yazmin.galindez@manpower.com.co"),
            array("name" => "Melanie Hernandez Vallejo", "email" => "melanie.hernandez@manpower.com.co"),
            array("name" => "Bryan Garcia Piedrahita", "email" => "bryan.garcia@manpower.com.co"),
            array("name" => "Hilda Doris Garces Gonzalez", "email" => "hilda.garces@manpower.com.co"),
            array("name" => "Yois Andrea Munoz Figueroa", "email" => "andrea.munoz@manpower.com.co"),
            array("name" => "Yudy Vanesa Hernandez Bustos", "email" => "vanesa.hernandez@manpower.com.co"),
            array("name" => "Katherine Yisset Munoz Soto", "email" => "katherine.munoz@manpower.com.co"),
            array("name" => "Damaris Maria Trillos Perez", "email" => "seleccion.bmanga@manpower.com.co"),
            array("name" => "Lina Maria Puerta Duque", "email" => "lina.puerta@manpower.com.co"),
            array("name" => "Katherine Herrera Restrepo", "email" => "katherine.herrera@manpower.com.co"),
            array("name" => "Diana Maria Salazar Hernandez", "email" => "diana.salazar@manpower.com.co"),
            array("name" => "Yuli Andrea Pena Farfan", "email" => "yuli.pena@manpower.com.co"),
            array("name" => "Helen Hermann Vasquez", "email" => "helen.hermann@manpower.com.co"),
            array("name" => "Dagoberto Pacheco Cortazar", "email" => "dagoberto.pacheco@manpower.com.co"),
            array("name" => "Angie Viviana Rodriguez Aguilera", "email" => "angie.rodriguez@manpower.com.co"),
            array("name" => "Manuela Soto Marin", "email" => "manuela.soto@manpower.com.co"),
            array("name" => "Deisy Milena Orjuela Ramirez", "email" => "deisy.orjuela@manpower.com.co"),
            array("name" => "Juliana Granados Luque", "email" => "juliana.granados@manpower.com.co"),
            array("name" => "Paula Katherine Sanchez Zornosa", "email" => "paula.sanchez@manpower.com.co"),
            array("name" => "Katheryn Gisette Robayo Cruz", "email" => "katheryn.robayo@manpower.com.co"),
            array("name" => "Julissa Paola Tirado Vanegas", "email" => "julissa.tirado@manpower.com.co"),
            array("name" => "Johana Pelaez Urrea", "email" => "johana.pelaez@manpower.com.co"),
            array("name" => "Julian Esteban Posada Lopez", "email" => "julian.posada@manpower.com.co"),
            array("name" => "Yeni Lorena Calderon Calderon", "email" => "lorena.calderon@manpower.com.co"),
            array("name" => "Lina Maria Solorzano Carvajal", "email" => "lina.solorzano@manpower.com.co"),
            array("name" => "Kelly Cecilia Cervantes De La Hoz", "email" => "kelly.cervantes@manpower.com.co"),
            array("name" => "Silvia Loraine Camero Urrego", "email" => "silvia.camero@manpower.com.co"),
            array("name" => "Gonzalo Sneider Mendoza Garcia", "email" => "gonzalo.mendoza@manpower.com.co"),
            array("name" => "Andres Felipe Plata Valencia", "email" => "andres.plata@manpower.com.co"),
            array("name" => "Leidy Viviana Londono Barbosa", "email" => "leidy.londono@manpower.com.co"),
            array("name" => "Adriana Carolina Ortega Osma", "email" => "adriana.ortega@manpower.com.co"),
            array("name" => "Claudia Ximena Dominguez  Acevedo", "email" => "ximena.dominguez@manpower.com.co"),
            array("name" => "Alexandra Urrea Henao", "email" => "alexandra.urrea@manpower.com.co"),
            array("name" => "Ana Maria Maya Gaviria", "email" => "ana.maya@manpower.com.co"),
            array("name" => "Christian Camilo Cano Munoz", "email" => "christianc.cano@manpower.com.co")
        );



        foreach ($users as $key => $value) {

            $password = Str::random(16);
            $value['password'] = Hash::make($password);

            $user = User::create($value);
            $user->assignRole('reclutador');
        }
    }
}

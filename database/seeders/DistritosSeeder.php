<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DistritosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('distritos')->insert([
            //Ahuachapan norte
            ['id'=>1,'nombre'=>'Atiquizaya','id_municipio'=>1],
            ['id'=>2,'nombre'=>'El Refugio','id_municipio'=>1],
            ['id'=>3,'nombre'=>'San Lorenzo','id_municipio'=>1],
            ['id'=>4,'nombre'=>'Turín','id_municipio'=>1],
            //Ahuachapan centro
            ['id'=>5,'nombre'=>'Ahuachapán','id_municipio'=>2],
            ['id'=>6,'nombre'=>'Apaneca','id_municipio'=>2],
            ['id'=>7,'nombre'=>'Concepción de Ataco','id_municipio'=>2],
            ['id'=>8,'nombre'=>'Tacuba','id_municipio'=>2],
            //Ahuachapan sur
            ['id'=>9,'nombre'=>'Guaymango','id_municipio'=>3],
            ['id'=>10,'nombre'=>'Jujutla','id_municipio'=>3],
            ['id'=>11,'nombre'=>'San Francisco Menendez','id_municipio'=>3],
            ['id'=>12,'nombre'=>'San Pedro Puxtla','id_municipio'=>3],
            //cabañas este
            ['id'=>13,'nombre'=>'Guacotecti','id_municipio'=>4],
            ['id'=>14,'nombre'=>'San Isidro','id_municipio'=>4],
            ['id'=>15,'nombre'=>'Sensuntepeque','id_municipio'=>4],
            ['id'=>16,'nombre'=>'Victoria','id_municipio'=>4],
            ['id'=>17,'nombre'=>'Dolores','id_municipio'=>4],
            //cabañas oeste
            ['id'=>18,'nombre'=>'Cinquera','id_municipio'=>5],
            ['id'=>19,'nombre'=>'Ilobasco','id_municipio'=>5],
            ['id'=>20,'nombre'=>'Jutiapa','id_municipio'=>5],
            ['id'=>21,'nombre'=>'Tejutepeque','id_municipio'=>5],
            //chalatenanfo norte
            ['id'=>22,'nombre'=>'Citalá','id_municipio'=>6],
            ['id'=>23,'nombre'=>'La Palma','id_municipio'=>6],
            ['id'=>24,'nombre'=>'San Ignacio','id_municipio'=>6],
            //chalatenango centro
            ['id'=>25,'nombre'=>'Agua Caliente','id_municipio'=>7],
            ['id'=>26,'nombre'=>'Dulce Nombre de María','id_municipio'=>7],
            ['id'=>27,'nombre'=>'El Paraíso','id_municipio'=>7],
            ['id'=>28,'nombre'=>'La Reina','id_municipio'=>7],
            ['id'=>29,'nombre'=>'Nueva Concepción','id_municipio'=>7],
            ['id'=>30,'nombre'=>'San Fernando','id_municipio'=>7],
            ['id'=>31,'nombre'=>'San Francisco Morazán','id_municipio'=>7],
            ['id'=>32,'nombre'=>'San Rafael','id_municipio'=>7],
            ['id'=>33,'nombre'=>'Santa Rita','id_municipio'=>7],
            ['id'=>34,'nombre'=>'Tejutla','id_municipio'=>7],

            //chalatenango sur
            ['id'=>35,'nombre'=>'Arcatao','id_municipio'=>8],
            ['id'=>36,'nombre'=>'Azacualpa','id_municipio'=>8],
            ['id'=>37,'nombre'=>'San José Cancasque','id_municipio'=>8],
            ['id'=>38,'nombre'=>'Chalatenango','id_municipio'=>8],
            ['id'=>39,'nombre'=>'Comalapa','id_municipio'=>8],
            ['id'=>40,'nombre'=>'Concepción Quezaltepeque','id_municipio'=>8],
            ['id'=>41,'nombre'=>'El Carrizal','id_municipio'=>8],
            ['id'=>42,'nombre'=>'La Laguna','id_municipio'=>8],
            ['id'=>43,'nombre'=>'Las Vueltas','id_municipio'=>8],
            ['id'=>44,'nombre'=>'San José Las Flores','id_municipio'=>8],
            ['id'=>45,'nombre'=>'Nombre de Jesús','id_municipio'=>8],
            ['id'=>46,'nombre'=>'Nueva Trinidad','id_municipio'=>8],
            ['id'=>47,'nombre'=>'Ojos de Agua','id_municipio'=>8],
            ['id'=>48,'nombre'=>'Potonico','id_municipio'=>8],
            ['id'=>49,'nombre'=>'San Antonio de la Cruz','id_municipio'=>8],
            ['id'=>50,'nombre'=>'San Antonio Los Ranchos','id_municipio'=>8],
            ['id'=>51,'nombre'=>'San Francisco Lempa','id_municipio'=>8],
            ['id'=>52,'nombre'=>'San Isidro Labrador','id_municipio'=>8],
            ['id'=>53,'nombre'=>'San Luis del Carmen','id_municipio'=>8],
            ['id'=>54,'nombre'=>'San Miguel de Mercedes','id_municipio'=>8],

            //cuscatlan norte
            ['id'=>55,'nombre'=>'Suchitoto','id_municipio'=>9],
            ['id'=>56,'nombre'=>'San José Guayabal','id_municipio'=>9],
            ['id'=>57,'nombre'=>'Oratorio de Concepción','id_municipio'=>9],
            ['id'=>58,'nombre'=>'San Bartolomé Perulapía','id_municipio'=>9],
            ['id'=>59,'nombre'=>'San Pedro Perulapán','id_municipio'=>9],

            //cuscatlan sur
            ['id'=>60,'nombre'=>'Cojutepeque','id_municipio'=>10],
            ['id'=>61,'nombre'=>'Candelaria','id_municipio'=>10],
            ['id'=>62,'nombre'=>'El Carmen','id_municipio'=>10],
            ['id'=>63,'nombre'=>'El Rosario','id_municipio'=>10],
            ['id'=>64,'nombre'=>'Monte San Juan','id_municipio'=>10],
            ['id'=>65,'nombre'=>'San Cristóbal','id_municipio'=>10],
            ['id'=>66,'nombre'=>'San Rafael Cedros','id_municipio'=>10],
            ['id'=>67,'nombre'=>'San Ramón','id_municipio'=>10],
            ['id'=>68,'nombre'=>'Santa Cruz Analquito','id_municipio'=>10],
            ['id'=>69,'nombre'=>'Santa Cruz Michapa','id_municipio'=>10],
            ['id'=>70,'nombre'=>'Tenancingo','id_municipio'=>10],

            //la libertad norte
            ['id'=>71,'nombre'=>'Quezaltepeque','id_municipio'=>11],
            ['id'=>72,'nombre'=>'San Matías','id_municipio'=>11],
            ['id'=>73,'nombre'=>'San Pablo Tacachico','id_municipio'=>11],

            //la libertad centro
            ['id'=>74,'nombre'=>'San Juan Opico','id_municipio'=>12],
            ['id'=>75,'nombre'=>'Ciudad Arce','id_municipio'=>12],

            //la libertad oeste
            ['id'=>76,'nombre'=>'Colón','id_municipio'=>13],
            ['id'=>77,'nombre'=>'Jayaque','id_municipio'=>13],
            ['id'=>78,'nombre'=>'Sacacoyo','id_municipio'=>13],
            ['id'=>79,'nombre'=>'Tepecoyo','id_municipio'=>13],
            ['id'=>80,'nombre'=>'Talnique','id_municipio'=>13],

            //la libertad este
            ['id'=>81,'nombre'=>'Antiguo Cuscatlán','id_municipio'=>14],
            ['id'=>82,'nombre'=>'Huizúcar','id_municipio'=>14],
            ['id'=>83,'nombre'=>'Nuevo Cuscatlán','id_municipio'=>14],
            ['id'=>84,'nombre'=>'San José Villanueva','id_municipio'=>14],
            ['id'=>85,'nombre'=>'Zaragoza','id_municipio'=>14],

            //la libertad costa
            ['id'=>86,'nombre'=>'Chiltiupán','id_municipio'=>15],
            ['id'=>87,'nombre'=>'Jicalapa','id_municipio'=>15],
            ['id'=>88,'nombre'=>'La Libertad','id_municipio'=>15],
            ['id'=>89,'nombre'=>'Tamanique','id_municipio'=>15],
            ['id'=>90,'nombre'=>'Teotepeque','id_municipio'=>15],

            //la libertad sur
            ['id'=>91,'nombre'=>'Santa Tecla','id_municipio'=>16],
            ['id'=>92,'nombre'=>'Comasagua','id_municipio'=>16],

            //la paz oeste
            ['id'=>93,'nombre'=>'Cuyultitán','id_municipio'=>17],
            ['id'=>94,'nombre'=>'Olocuilta','id_municipio'=>17],
            ['id'=>95,'nombre'=>'San Juan Talpa','id_municipio'=>17],
            ['id'=>96,'nombre'=>'San Luis Talpa','id_municipio'=>17],
            ['id'=>97,'nombre'=>'San Pedro Masahuat','id_municipio'=>17],
            ['id'=>98,'nombre'=>'Tapalhuaca','id_municipio'=>17],
            ['id'=>99,'nombre'=>'San Francisco Chinameca','id_municipio'=>17],

            //la paz centro
            ['id'=>100,'nombre'=>'El Rosario','id_municipio'=>18],
            ['id'=>101,'nombre'=>'Jerusalén','id_municipio'=>18],
            ['id'=>102,'nombre'=>'Mercedes La Ceiba','id_municipio'=>18],
            ['id'=>103,'nombre'=>'Paraíso de Osorio','id_municipio'=>18],
            ['id'=>104,'nombre'=>'San Antonio Masahuat','id_municipio'=>18],
            ['id'=>105,'nombre'=>'San Emigdio','id_municipio'=>18],
            ['id'=>106,'nombre'=>'San Juan Tepezontes','id_municipio'=>18],
            ['id'=>107,'nombre'=>'San Luis La Herradura','id_municipio'=>18],
            ['id'=>108,'nombre'=>'San Miguel Tepezontes','id_municipio'=>18],
            ['id'=>109,'nombre'=>'San Pedro Nonualco','id_municipio'=>18],
            ['id'=>110,'nombre'=>'Santa María Ostuma','id_municipio'=>18],
            ['id'=>111,'nombre'=>'Santiago Nonualco','id_municipio'=>18],

            //la paz este
            ['id'=>112,'nombre'=>'San Juan Nonualco','id_municipio'=>19],
            ['id'=>113,'nombre'=>'San Rafael Obrajuelo','id_municipio'=>19],
            ['id'=>114,'nombre'=>'Zacatecoluca','id_municipio'=>19],

            //la union norte
            ['id'=>115,'nombre'=>'Anamorós','id_municipio'=>20],
            ['id'=>116,'nombre'=>'Bolívar','id_municipio'=>20],
            ['id'=>117,'nombre'=>'Concepción de Oriente','id_municipio'=>20],
            ['id'=>118,'nombre'=>'El Sauce','id_municipio'=>20],
            ['id'=>119,'nombre'=>'Lislique','id_municipio'=>20],
            ['id'=>120,'nombre'=>'Nueva Esparta','id_municipio'=>20],
            ['id'=>121,'nombre'=>'Pasaquina','id_municipio'=>20],
            ['id'=>122,'nombre'=>'Polorós','id_municipio'=>20],
            ['id'=>123,'nombre'=>'San José','id_municipio'=>20],
            ['id'=>124,'nombre'=>'Santa Rosa de Lima','id_municipio'=>20],

            //la union sur
            ['id'=>125,'nombre'=>'Conchagua','id_municipio'=>21],
            ['id'=>126,'nombre'=>'El Carmen','id_municipio'=>21],
            ['id'=>127,'nombre'=>'Intipucá','id_municipio'=>21],
            ['id'=>128,'nombre'=>'La Unión','id_municipio'=>21],
            ['id'=>129,'nombre'=>'Meanguera del Golfo','id_municipio'=>21],
            ['id'=>130,'nombre'=>'San Alejo','id_municipio'=>21],
            ['id'=>131,'nombre'=>'Yayantique','id_municipio'=>21],
            ['id'=>132,'nombre'=>'Yucuaiquín','id_municipio'=>21],

            //morazan norte
            ['id'=>133,'nombre'=>'Arambala','id_municipio'=>22],
            ['id'=>134,'nombre'=>'Cacaopera','id_municipio'=>22],
            ['id'=>135,'nombre'=>'Corinto','id_municipio'=>22],
            ['id'=>136,'nombre'=>'El Rosario','id_municipio'=>22],
            ['id'=>137,'nombre'=>'Joateca','id_municipio'=>22],
            ['id'=>138,'nombre'=>'Jocoaitique','id_municipio'=>22],
            ['id'=>139,'nombre'=>'Meanguera','id_municipio'=>22],
            ['id'=>140,'nombre'=>'Perquín','id_municipio'=>22],
            ['id'=>141,'nombre'=>'San Fernando','id_municipio'=>22],
            ['id'=>142,'nombre'=>'San Isidro','id_municipio'=>22],
            ['id'=>143,'nombre'=>'Torola','id_municipio'=>22],

            //morazan sur
            ['id'=>144,'nombre'=>'Chilanga','id_municipio'=>23],
            ['id'=>145,'nombre'=>'Delicias de Concepción','id_municipio'=>23],
            ['id'=>146,'nombre'=>'El Divisadero','id_municipio'=>23],
            ['id'=>147,'nombre'=>'Gualococti','id_municipio'=>23],
            ['id'=>148,'nombre'=>'Guatajiagua','id_municipio'=>23],
            ['id'=>149,'nombre'=>'Jocoro','id_municipio'=>23],
            ['id'=>150,'nombre'=>'Lolotiquillo','id_municipio'=>23],
            ['id'=>151,'nombre'=>'Osicala','id_municipio'=>23],
            ['id'=>152,'nombre'=>'San Carlos','id_municipio'=>23],
            ['id'=>153,'nombre'=>'San Francisco Gotera','id_municipio'=>23],
            ['id'=>154,'nombre'=>'San Simón','id_municipio'=>23],
            ['id'=>155,'nombre'=>'Sensembra','id_municipio'=>23],
            ['id'=>156,'nombre'=>'Sociedad','id_municipio'=>23],
            ['id'=>157,'nombre'=>'Yamabal','id_municipio'=>23],
            ['id'=>158,'nombre'=>'Yoloaiquín','id_municipio'=>23],

            //san miguel norte
            ['id'=>159,'nombre'=>'Ciudad Barrios','id_municipio'=>24],
            ['id'=>160,'nombre'=>'Sesori','id_municipio'=>24],
            ['id'=>161,'nombre'=>'Nuevo Edén de San Juan','id_municipio'=>24],
            ['id'=>162,'nombre'=>'San Gerardo','id_municipio'=>24],
            ['id'=>163,'nombre'=>'San Luis de la Reina','id_municipio'=>24],
            ['id'=>164,'nombre'=>'Carolina','id_municipio'=>24],
            ['id'=>165,'nombre'=>'San Antonio del Mosco','id_municipio'=>24],
            ['id'=>166,'nombre'=>'Chapeltique','id_municipio'=>24],

            //san miguel centro
            ['id'=>167,'nombre'=>'San Miguel','id_municipio'=>25],
            ['id'=>168,'nombre'=>'Comacarán','id_municipio'=>25],
            ['id'=>169,'nombre'=>'Uluazapa','id_municipio'=>25],
            ['id'=>170,'nombre'=>'Moncagua','id_municipio'=>25],
            ['id'=>171,'nombre'=>'Quelepa','id_municipio'=>25],
            ['id'=>172,'nombre'=>'Chirilagua','id_municipio'=>25],

            //san miguel oeste
            ['id'=>173,'nombre'=>'Chinameca','id_municipio'=>26],
            ['id'=>174,'nombre'=>'El Tránsito','id_municipio'=>26],
            ['id'=>175,'nombre'=>'Lolotique','id_municipio'=>26],
            ['id'=>176,'nombre'=>'Nueva Guadalupe','id_municipio'=>26],
            ['id'=>177,'nombre'=>'San Jorge','id_municipio'=>26],
            ['id'=>178,'nombre'=>'San Rafael Oriente','id_municipio'=>26],

            //san salvador norte
            ['id'=>179,'nombre'=>'Aguilares','id_municipio'=>27],
            ['id'=>180,'nombre'=>'El Paisnal','id_municipio'=>27],
            ['id'=>181,'nombre'=>'Guazapa','id_municipio'=>27],

            //san salvador oeste
            ['id'=>182,'nombre'=>'Apopa','id_municipio'=>28],
            ['id'=>183,'nombre'=>'Nejapa','id_municipio'=>28],

            //san salvadoreste
            ['id'=>184,'nombre'=>'Ilopango','id_municipio'=>29],
            ['id'=>185,'nombre'=>'San Martín','id_municipio'=>29],
            ['id'=>186,'nombre'=>'Soyapango','id_municipio'=>29],
            ['id'=>187,'nombre'=>'Tonacatepeque','id_municipio'=>29],

            //san salvador centro
            ['id'=>188,'nombre'=>'Ayutuxtepeque','id_municipio'=>30],
            ['id'=>189,'nombre'=>'Mejicanos','id_municipio'=>30],
            ['id'=>190,'nombre'=>'Cuscatancingo','id_municipio'=>30],
            ['id'=>191,'nombre'=>'Ciudad Delgado','id_municipio'=>30],
            ['id'=>192,'nombre'=>'San Salvador','id_municipio'=>30],

            //san salvador sur
            ['id'=>193,'nombre'=>'San Marcos','id_municipio'=>31],
            ['id'=>194,'nombre'=>'Santo Tomás','id_municipio'=>31],
            ['id'=>195,'nombre'=>'Santiago Texacuangos','id_municipio'=>31],
            ['id'=>196,'nombre'=>'Panchimalco','id_municipio'=>31],
            ['id'=>197,'nombre'=>'Rosario de Mora','id_municipio'=>31],

            //san vicente norte
            ['id'=>198,'nombre'=>'Apastepeque','id_municipio'=>32],
            ['id'=>199,'nombre'=>'San Lorenzo','id_municipio'=>32],
            ['id'=>200,'nombre'=>'San Sebastián','id_municipio'=>32],
            ['id'=>201,'nombre'=>'San Ildefonso','id_municipio'=>32],
            ['id'=>202,'nombre'=>'San Esteban Catarina','id_municipio'=>32],
            ['id'=>203,'nombre'=>'Santo Domingo','id_municipio'=>32],
            ['id'=>204,'nombre'=>'Santa Clara','id_municipio'=>32],

            //san vicente sur
            ['id'=>205,'nombre'=>'San Vicente','id_municipio'=>33],
            ['id'=>206,'nombre'=>'Guadalupe','id_municipio'=>33],
            ['id'=>207,'nombre'=>'San Cayetano Istepeque','id_municipio'=>33],
            ['id'=>208,'nombre'=>'Tecoluca','id_municipio'=>33],
            ['id'=>209,'nombre'=>'Tepetitán','id_municipio'=>33],
            ['id'=>210,'nombre'=>'Verapaz','id_municipio'=>33],

            //santa ana norte
            ['id'=>211,'nombre'=>'Masahuat','id_municipio'=>34],
            ['id'=>212,'nombre'=>'Metapán','id_municipio'=>34],
            ['id'=>213,'nombre'=>'Santa Rosa Guachipilín','id_municipio'=>34],
            ['id'=>214,'nombre'=>'Texistepeque','id_municipio'=>34],

            //santa ana centro
            ['id'=>215,'nombre'=>'Santa Ana','id_municipio'=>35],

            //santa ana este
            ['id'=>216,'nombre'=>'Coatepeque','id_municipio'=>36],
            ['id'=>217,'nombre'=>'El Congo','id_municipio'=>36],

            //santa ana oeste
            ['id'=>218,'nombre'=>'Candelaria de la Frontera','id_municipio'=>37],
            ['id'=>219,'nombre'=>'Chalchuapa','id_municipio'=>37],
            ['id'=>220,'nombre'=>'El Porvenir','id_municipio'=>37],
            ['id'=>221,'nombre'=>'San Antonio Pajonal','id_municipio'=>37],
            ['id'=>222,'nombre'=>'San Sebastián Salitrillo','id_municipio'=>37],
            ['id'=>223,'nombre'=>'Santiago de la Frontera','id_municipio'=>37],

            //sonsonate norte
            ['id'=>224,'nombre'=>'Juayúa','id_municipio'=>38],
            ['id'=>225,'nombre'=>'Nahuizalco','id_municipio'=>38],
            ['id'=>226,'nombre'=>'Salcoatitán','id_municipio'=>38],
            ['id'=>227,'nombre'=>'Santa Catarina Masahuat','id_municipio'=>38],

            //sonsonate centro
            ['id'=>228,'nombre'=>'Sonsonate','id_municipio'=>39],
            ['id'=>229,'nombre'=>'Sonzacate','id_municipio'=>39],
            ['id'=>230,'nombre'=>'Nahulingo','id_municipio'=>39],
            ['id'=>231,'nombre'=>'San Antonio del Monte','id_municipio'=>39],
            ['id'=>232,'nombre'=>'Santo Domingo de Guzmán','id_municipio'=>39],

            //sonsonate este
            ['id'=>233,'nombre'=>'Armenia','id_municipio'=>40],
            ['id'=>234,'nombre'=>'Caluco','id_municipio'=>40],
            ['id'=>235,'nombre'=>'Cuisnahuat','id_municipio'=>40],
            ['id'=>236,'nombre'=>'Izalco','id_municipio'=>40],
            ['id'=>237,'nombre'=>'San Julián','id_municipio'=>40],
            ['id'=>238,'nombre'=>'Santa Isabel Ishuatán','id_municipio'=>40],

            //sonsonate oeste
            ['id'=>239,'nombre'=>'Acajutla','id_municipio'=>41],

            //usulutan norte
            ['id'=>240,'nombre'=>'Santiago de María','id_municipio'=>42],
            ['id'=>241,'nombre'=>'Alegría','id_municipio'=>42],
            ['id'=>242,'nombre'=>'Berlín','id_municipio'=>42],
            ['id'=>243,'nombre'=>'Mercedes Umaña','id_municipio'=>42],
            ['id'=>244,'nombre'=>'Jucuapa','id_municipio'=>42],
            ['id'=>245,'nombre'=>'El Triunfo','id_municipio'=>42],
            ['id'=>246,'nombre'=>'Estanzuelas','id_municipio'=>42],
            ['id'=>247,'nombre'=>'San Buena ventura','id_municipio'=>42],
            ['id'=>248,'nombre'=>'Nueva Granada','id_municipio'=>42],




            ['id'=>249,'nombre'=>'California','id_municipio'=>43],
            ['id'=>250,'nombre'=>'Concepción Batres','id_municipio'=>43],
            ['id'=>251,'nombre'=>'Ereguayquín','id_municipio'=>43],
            ['id'=>252,'nombre'=>'Jucuarán','id_municipio'=>43],
            ['id'=>253,'nombre'=>'Ozatlán','id_municipio'=>43],
            ['id'=>254,'nombre'=>'Santa Elena','id_municipio'=>43],
            ['id'=>255,'nombre'=>'San Dionisio','id_municipio'=>43],
            ['id'=>256,'nombre'=>'Santa María','id_municipio'=>43],
            ['id'=>257,'nombre'=>'Tecapán','id_municipio'=>43],
            ['id'=>258,'nombre'=>'Usulután','id_municipio'=>43],

            ['id'=>259,'nombre'=>'Jiquilisco','id_municipio'=>44],
            ['id'=>260,'nombre'=>'Puerto El Triunfo','id_municipio'=>44],
            ['id'=>261,'nombre'=>'San Agustín','id_municipio'=>44],
            ['id'=>262,'nombre'=>'San Francisco Javier','id_municipio'=>44],

        ]);
    }

    
}

<?php

namespace Database\Seeders;

use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServicesSeeder extends Seeder {
    
    public function run(): void {
        
        $links = [
            'https://www.youtube.com/watch?v=C6mM3gWzgGc',
            'https://www.youtube.com/watch?v=UckzrccW30A',
            'https://www.youtube.com/watch?v=8gIihv4-sQk',
            'https://www.youtube.com/watch?v=zo7plLV9YE4',
            'https://www.youtube.com/watch?v=LwjxlbAPJSc',
            'https://www.youtube.com/watch?v=r8cy8iu0C_U',
            'https://www.youtube.com/watch?v=Zf54l_Xhqvw',
            'https://www.youtube.com/watch?v=h-Z8_qsQYXc',
        ];
        $services = ['Rafting', 'Bungee jumping', 'Espeleología y cueva', 'Circuitos', 'Tours', 'Parapente', 'Torrentismo', 'Cabalgata'];

        foreach ($services as $key => $service) {   
            $service = Service::create([
                'title' => $service,
                'slug' => Str::slug($service),
                'content' => 'Una inmersión total en la naturaleza, caverna húmeda ubicada en el Municipio del Paramo, cuyo recorrido se realiza en un aproximado de dos horas, encontraras formaciones rocosas de carbonato de calcio, variedad de murciélagos, zonas de arrastre y un salto a vacío que se realiza con la única luz que la linterna proporciona.',
                'body' => '<p><strong>TIEMPO DE DURACIÓN:</strong><br>2 Horas aproximadamente.</p><p><strong>HORARIOS Y LUGAR:</strong><br>Municipio de Paramo<br>Salidas continuas de 8:00 AM a 4:00 PM</p><p><strong>INCLUYE:</strong></p><ul><li>Póliza de Asistencia</li><li>Equipos Certificados</li><li>Guías Especializados</li><li>Servicio de Fotografía (Adicional)</li></ul><p>&nbsp;</p><p><strong>INFORMACIÓN ADICIONAL</strong></p><ul><li>Actividad apta para personas en rangos de edad comprendidas entre los 5 y 60 años.</li><li>Se recomienda el uso de ropa cómoda deportiva que se pueda mojar, ensuciar y demás, zapatos deportivos cerrado, del mismo modo uso de bloqueador y repelente.</li><li>Estar puntual a la hora de salida acordada.</li><li>No estar en estado de embarazo.</li><li>No estar en estado de embriaguez ni bajo efectos de sustancias psicoactivas.</li><li>No tener cirugías recientes inferiores a 3 meses.</li></ul>',
            ]);

            $uuid = Str::uuid();

            $url = "images/services/$uuid.jpg";

            Storage::copy('images/test-images/' . $key + 1 .'.jpg', $url);     
            
            $service->image()->create([
                'url' => $url,
            ]);

            for ($i=0; $i < 20; $i++) { 
                $gallery = Gallery::create([
                    'type' => 0,
                    'link' => '',
                    'service_id' => $service->id
                ]);

                $uuid = Str::uuid();

                $key = rand(1,8);

                $url = "images/gallery/$uuid.jpg";

                Storage::copy('images/test-images/' . $key .'.jpg', $url);     
                
                $gallery->image()->create([
                    'url' => $url,
                ]);
            }

            for ($i=0; $i < 20; $i++) { 
                Gallery::create([
                    'type' => 1,
                    'link' => $this->getUrl($links[rand(0,7)]),
                    'service_id' => $service->id
                ]);
            }

        }

    }

    protected function getUrl($url){
        $patron = '/^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/';
        $array = preg_match($patron, $url, $parte);
        return '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $parte[1] .'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }
}

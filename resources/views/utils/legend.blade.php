@extends('utils/index')

@section('content')
    <div class="app-content main-content">
        <div class="side-app">

            <!--app header-->
            <x-AdminHeader/>
            <!--/app header-->

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title mb-0">Utilitare</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item" aria-current="page"><!-- Dashboard --></li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row-3 -->
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Legenda</h3>
                        </div>
                        
                        
                        <div class="card-body">
                         <table id="lista_iduri" class="table table-bordered table-striped table-responsive">
                            	<thead>
                            		<tr>
                            			<th><h5>Lista CRON-uri</h5></th>
                            			<th><h5>GeFEE_SRV</h5></th>
                            			<th><h5>GeFEE_SRV Cod Customizat</h5></th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<tr>
                            		<td>
                            			<ul>
                            			<li>1	-  Creare User CRM </li>
                            			<li>2	-  Data scadenta facturi </li>
                            			<li>3	-  Emitere facturi </li>
                            			<li>4	-  Qmail </li>
                            			<li>6	-  Plati online </li>
                            			<li>7	-  Alerte calendar </li>
                            			<li>8	-  Acordare bonus agenti </li>
                            			<li>9	-  Acordare comision agenti </li>
                            			<li>10	-  Validare bonus / comision agenti </li>
                            			<li>11	-  Rezultate tranzactii OPCOM </li>
                            			<li>12	-  Reincadrare pe benzi de comisionare </li>
                            			<li>13	-  Import EoN din mail </li>
                            			<li>14	-  Incadrare pe benzi de comisionare retroactiv </li>
                            			<li>15	-  Dezalocare clienti potentiali </li>
                            			<li>16	-  Task-uri automate </li>
                            			<li>17	-  Creare Roluri Alternative User CRM </li>
                            			<li>18	-  Reminder s/r raspuns </li>
                            			<li>19	-  Reminder s/r raspuns OD </li>
                            			<li>20	-  Trimitere notificare autocitire </li>
                            			<li>21	-  Marcare oferte ca expirate </li>
                            			<li>22	-  Actualizare parteneri </li>
                            			<li>25	-  Convertire oferte in contracte </li>
                            			<li>28	-  Expirare contract </li>
                            			<li>29	-  Qsms
                            			</li><li>30	-  Notificari liste de distributie </li>
                            			<li>33	-  Acordare bonus semnare agenti </li>
                            			<li>35	-  Procesare acte aditionale </li>
                            			<li>36	-  Notificare deschidere PZU </li>
                            			<li>37	-  Notificare inchidere PZU </li>
                            			<li>38	-  Notificare netransmitere date zilnice </li>
                            			<li>39	-  Notificare modificare efectiva a datelor de catre PRE </li>
                            			<li>40	-  Notificare disponibilitate Unitati Dispecerizabile </li>
                            			<li>41	-  Notificare neinchidere contur </li>
                            			<li>42	-  Notificare instiintare modificare date de catre PRE </li>
                            			<li>43	-  Notificare transmitere machete lunare </li>
                            			<li>44	-  Notificare pentru transmitere realizat consum/productie </li>
                            			<li>45	-  Notificare inchidere contur total PRE </li>
                            			<li>46	-  Notificare inchidere luna </li>
                            			<li>47	-  Reminder s/r fara tema </li>
                            			</ul>
                            		</td>
                            		<td>
                            			<ul>
                            			<li>1	- Plati PayZone</li>
                            			<li>2	- Plati Un-Doi</li>
                            			<li>3	- Import date in format GeFEE - Parteneri</li>
                            			<li>4	- Import date in format GeFEE - BP_CA</li>
                            			<li>5	- Incasari SAP</li>
                            			<li>6	- Avansuri SAP</li>
                            			<li>7	- Genereaza PV in .pdf pentru GeFEE4Web</li>
                            			<li>8	- Genereaza Facturi in .pdf pentru GeFEE4Web</li>
                            			<li>9	- Repartizare automata incasari nerepartizate</li>
                            			<li>10	- Executie periodica cod customizat</li>
                            			<li>11	- Genereaza PCL din PDF generate</li>
                            			<li>12	- PayPoint-Restart</li>
                            			<li>13	- PayZone-Restart</li>
                            			<li>14	- PostaRomana-Restart</li>
                            			<li>15	- BancaTransilvania-Restart</li>
                            			<li>16	- Un-Doi-Restart</li>
                            			<li>17	- ZebraPayments-Restart</li>
                            			<li>18	- BRD-Restart</li>
                            			<li>19	- BRD-codebare</li>
                            			<li>20	- BT-dbf</li>
                            			<li>21	- UpdateDB</li>
                            			<li>22	- Update serviciu de update</li>
                            			<li>23	- Merge PDF din facturi generate deja, pdf-urile sunt splitate pe numar de pagini</li>
                            			<li>24	- Executie batch</li>
                            			<li>25	- Import date in format SAP Engie - Parteneri</li>
                            			<li>26	- Merge PDF din facturi generate deja, pdf-urile sunt splitate pe 1 sau mai multe pagini, fara pag mk (Printator ZIPPER)</li>
                            			<li>27	- Trimite facturi nesemnate la semnare (specifc CEZ)</li>
                            			<li>28	- Import date in format SAP Engie - Fisa de cont (incasari)</li>
                            			<li>29	- Calcul automat metadate PRE</li>
                            			<li>30	- Log automat</li>
                            			<li>31	- Banca Transilvania - cod bare - txt</li>
                            			<li>32	- Plati PayPoint</li>
                            			</ul>
                            		</td>
                            
                            		<td>
                            			<ul>
                            			<li>1	- Creare(update) cod BP dupa IdParteneri</li>
                            			<li>2	- Seteaza conturile contabile ale partenerilor nou adaugati</li>
                            			<li>3	- Asociaza automat PC-urile la CA-uri, acolo unde exista un singur CA definit la nivel de partener</li>
                            			<li>4	- Marcheaza partenerii pentru a li se crea cont CRM</li>
                            			<li>5	- Creaza inregistrari in DocumenteWeb pentru facturile venite din SAP</li>
                            			<li>6	- Marcheaza ca "Finalizat la termen" contractele active ce au expirat</li>
                            			<li>7	- Adauga automat ATR-uri in baza datelor din _webDetaliiPunctConsum</li>
                            			<li>9	- Seteaza banda consum ANRE conform sugestie banda GeFEE</li>
                            			<li>10	- Actualizeaza banda consum ANRE conform sugestie GeFEE la inceput de februarie</li>
                            			<li>100	- Seteaza departamentul unui contract in functie de tip</li>
                            			<li>101	- Repartizeaza incasarile nerepartizate pentru partenerii ce au doar contract de energie</li>
                            			<li>102	- Repartizeaza incasarile nerepartizate pentru partenerii ce au doar contract de gaze naturale</li>
                            			<li>103	- Repartizeaza incasarile nerepartizate pe facturi ce tin de acelasi contract</li>
                            			<li>104	- Stinge toate facturile negative din baza de date</li>
                            			<li>105	- Repartizeaza incasarile nerepartizate la facturile cu sold</li>
                            			<li>106	- Repartizeaza incasarile facturilor negative la factura stornata</li>
                            			<li>107	- Repartizeaza incasarile nerepartizate pentru incasarile ce nu tin nici de factura si nici de contract</li>
                            			</ul>
                            		</td>
                                	</tr>
                                 </tbody>
                             </table>
 
                         <table id="lista_clienti_actuali" class="table table-bordered table-striped">
                        	<thead>
                        		<tr>
                        			<th><h5>Clienti GeFEE Energy</h5></th>
                        			<th><h5>Clienti GeFEE Gas</h5></th>
                        			<th><h5>Clienti GeFEE PRE</h5></th>
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr>
                        		<td>
                        			<ul>
                        			<li><strong>1</strong> - Absolute Energy [4web - EE]</li>
                        			<li><strong>2</strong> - Aderro GP Energy [4web - EE]</li>
                        			<!-- <li><strong>3</strong> - Arelco Energy [4web - EE]</li>
                        			<li><strong>4</strong> - Arelco Power [4web - EE]</li> -->
                        			<li><strong>3</strong> - Apuron [4web - EE]</li>
                        			<li><strong>4</strong> - C-Gaz &amp; Energy Distribution</li>
                        			<li><strong>5</strong> - Curent Alternativ [4web - EE]</li>
                        			<li><strong>6</strong> - CYEB</li>
                        			<li><strong>7</strong> - EFT Furnizare</li>
                        			<li><strong>8</strong> - Electricom [4web - EE]</li>
                        			<li><strong>9</strong> - Entrex [4web - EE]</li>
                        			<li><strong>10</strong> - Getica 95 [4web - EE]</li>
                        			<li><strong>11</strong> - GDM Logistics [4web - EE]</li>
                        			<li><strong>12</strong> - Industrial Energy [4web - EE]</li>
                        			<li><strong>13</strong> - Kompact Grid</li>
                        			<li><strong>14</strong> - Lukoil Energy &amp; Gas [4web - EE]</li>
                        			<li><strong>15</strong> - MET Romania [4web - EE &amp; GN]</li>
                        			<li><strong>16</strong> - Monsson Trading [4web - EE]</li>
                        			<li><strong>17</strong> - Nova Power &amp; Gas [4web - EE]</li>
                        			<li><strong>18</strong> - Ovidiu Development (CEZ) [4web - EE]</li>
                        			<li><strong>19</strong> - QMB Energ</li>
                        			<li><strong>20</strong> - Restart Energy [4web - EE &amp; GN]</li>
                        			<li><strong>21</strong> - RWE Energy [4web - EE &amp; GN]</li>
                        			<li><strong>22</strong> - Werk Energy [4web - EE]</li>
                        			<li><strong>23</strong> - Mazarine [4web - EE]</li>
                        			<li><strong>24</strong> - Energia [4web - EE &amp; GN]</li>
                        			<li><strong>25</strong> - Anchor [4web - EE]</li>
                        			</ul>
                        		</td>
                        
                        		<td>
                        			<ul>
                        			<li><strong>1</strong> - Aderro GP Energy [4web - EE]</li>
                        			<li><strong>2</strong> - CEZ Vanzare [4web - GN]</li>
                        			<li><strong>3</strong> - Entrex [4web - EE]</li>
                        			<li><strong>4</strong> - Forte Gaz [4web - GN]</li>
                        			<li><strong>5</strong> - Next Energy Distribution</li>
                        			<li><strong>6</strong> - Nova Power &amp; Gas [4web - EE]</li>
                        			<li><strong>7</strong> - MET Romania [4web - EE &amp; GN]</li>
                        			<li><strong>8</strong> - Restart Energy [4web - EE &amp; GN]</li>
                        			<li><strong>9</strong> - RWE Energy [4web - EE &amp; GN]</li>
                        			<li><strong>9</strong> - RWE Energy [4web - EE &amp; GN]</li>
                        			<li><strong>10</strong> - Energia [4web - EE &amp; GN]</li>
                        			</ul>
                        		</td>
                        
                        		<td>
                        			<ul>
                        			<li><strong>1</strong> - Engie Romania [4web - PRE]</li>
                        			<li><strong>2</strong> - MET Romania</li>
                        			</ul>
                        		</td>
                        	</tr>
                         </tbody>
                         </table>
                    	</div>
                    
                </div>
            </div>
            <!-- End Row-3 -->
        </div>
    </div>
@endsection

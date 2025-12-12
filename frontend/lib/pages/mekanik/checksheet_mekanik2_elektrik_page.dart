import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../models/user_model.dart';
import '../../models/jadwal_model.dart';
import '../../models/checksheet_gerbong_fase_model.dart';
import '../../models/checksheet_kategori_model.dart';
import '../../models/checksheet_komponen_model.dart';
import 'checksheet_gerbong_fase_page.dart';

class ChecksheetMekanik2ElektrikPage extends StatefulWidget {
  final User user;
  final JadwalModel jadwal;
  final int laporanId;
  final String sheetType; // 'Mekanik 2' atau 'Elektrik'
  final ChecksheetGerbongFaseModel gerbongFaseData;

  const ChecksheetMekanik2ElektrikPage({
    Key? key,
    required this.user,
    required this.jadwal,
    required this.laporanId,
    required this.sheetType,
    required this.gerbongFaseData,
  }) : super(key: key);

  @override
  State<ChecksheetMekanik2ElektrikPage> createState() =>
      _ChecksheetMekanik2ElektrikPageState();
}

class _ChecksheetMekanik2ElektrikPageState
    extends State<ChecksheetMekanik2ElektrikPage> {
  bool _isLoading = false;
  final ScrollController _listScrollController = ScrollController();
  bool _showBackToTop = false;

  late List<ChecksheetKategoriModel> _kategoriList;

  @override
  void initState() {
    super.initState();
    _initializeChecksheetData();

    _listScrollController.addListener(() {
      if (_listScrollController.hasClients) {
        final showButton = _listScrollController.offset > 200;
        if (showButton != _showBackToTop) {
          setState(() {
            _showBackToTop = showButton;
          });
        }
      }
    });
  }

  @override
  void dispose() {
    _listScrollController.dispose();
    super.dispose();
  }

  void _initializeChecksheetData() {
    // Data dummy untuk Mekanik 2 dan Elektrik
    if (widget.sheetType == 'Mekanik 2') {
      _kategoriList = [
        ChecksheetKategoriModel(
          namaKategori: 'PEMERIKSAAN MEKANIK 2',
          items: [
            ChecksheetKomponenModel(
              itemPemeriksaan: 'a. Kondisi Rangka Kereta',
              standar: 'Baik',
            ),
            ChecksheetKomponenModel(
              itemPemeriksaan: 'b. Kondisi Pintu',
              standar: 'Berfungsi',
            ),
            ChecksheetKomponenModel(
              itemPemeriksaan: 'c. Kondisi Jendela',
              standar: 'Baik/Utuh',
            ),
          ],
        ),
      ];
    } else {
      // Elektrik
      _kategoriList = [
        ChecksheetKategoriModel(
          namaKategori: 'PEMERIKSAAN ELEKTRIK',
          items: [
            ChecksheetKomponenModel(
              itemPemeriksaan: 'a. Kondisi Lampu',
              standar: 'Berfungsi',
            ),
            ChecksheetKomponenModel(
              itemPemeriksaan: 'b. Kondisi AC',
              standar: 'Berfungsi',
            ),
            ChecksheetKomponenModel(
              itemPemeriksaan: 'c. Kondisi Kabel',
              standar: 'Baik',
            ),
          ],
        ),
      ];
    }
  }

  void _scrollToTop() {
    _listScrollController.animateTo(
      0,
      duration: const Duration(milliseconds: 500),
      curve: Curves.easeOut,
    );
  }

  Widget _buildCustomHeader() {
    return Container(
      decoration: const BoxDecoration(
        color: Color(0xFF2C2A6B),
        borderRadius: BorderRadius.only(
          bottomLeft: Radius.circular(24.0),
          bottomRight: Radius.circular(24.0),
        ),
      ),
      child: SafeArea(
        bottom: false,
        child: Padding(
          padding: const EdgeInsets.fromLTRB(24.0, 16.0, 24.0, 20.0),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Image.asset(
                'assets/logo_putih.png',
                height: 40,
                width: 80,
                errorBuilder: (context, error, stackTrace) {
                  return Container(
                    height: 40,
                    width: 80,
                    color: Colors.white.withOpacity(0.2),
                    child: Center(
                      child: Text(
                        'KAI',
                        style: GoogleFonts.plusJakartaSans(
                          color: Colors.white,
                          fontWeight: FontWeight.bold,
                          fontSize: 16.0,
                        ),
                      ),
                    ),
                  );
                },
              ),
              CircleAvatar(
                radius: 20.0,
                backgroundColor: Colors.white,
                child: CircleAvatar(
                  radius: 18.0,
                  backgroundImage:
                      widget.user.photoUrl != null
                          ? NetworkImage(widget.user.photoUrl!)
                          : null,
                  backgroundColor: const Color(0xFF2C2A6B).withOpacity(0.1),
                  child:
                      widget.user.photoUrl == null
                          ? Text(
                            _getInitials(),
                            style: GoogleFonts.plusJakartaSans(
                              fontSize: 16.0,
                              fontWeight: FontWeight.bold,
                              color: const Color(0xFF2C2A6B),
                            ),
                          )
                          : null,
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }

  Widget _buildBackButton() {
    return Padding(
      padding: const EdgeInsets.fromLTRB(16.0, 16.0, 16.0, 8.0),
      child: Align(
        alignment: Alignment.centerLeft,
        child: InkWell(
          onTap: () => Navigator.pop(context),
          borderRadius: BorderRadius.circular(8.0),
          child: Row(
            mainAxisSize: MainAxisSize.min,
            children: [
              const Icon(
                Icons.arrow_back,
                color: Color(0xFF0063F7),
                size: 20.0,
              ),
              const SizedBox(width: 8.0),
              Text(
                'Kembali ke Dashboard',
                style: GoogleFonts.plusJakartaSans(
                  fontSize: 15.0,
                  fontWeight: FontWeight.w700,
                  color: const Color(0xFF0063F7),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }

  Widget _buildInfoSection() {
    return Container(
      margin: const EdgeInsets.all(16.0),
      padding: const EdgeInsets.all(16.0),
      decoration: BoxDecoration(
        color: const Color(0xFF2196F3).withOpacity(0.1),
        borderRadius: BorderRadius.circular(8.0),
        border: Border.all(color: const Color(0xFF2196F3).withOpacity(0.3)),
      ),
      child: Column(
        children: [
          Row(
            children: [
              Icon(
                widget.sheetType == 'Mekanik 2' ? Icons.settings : Icons.bolt,
                color: const Color(0xFF2196F3),
              ),
              const SizedBox(width: 8.0),
              Text(
                '${widget.sheetType} Checksheet',
                style: GoogleFonts.plusJakartaSans(
                  fontSize: 16.0,
                  fontWeight: FontWeight.w700,
                  color: const Color(0xFF2196F3),
                ),
              ),
            ],
          ),
          const SizedBox(height: 8.0),
          Divider(color: const Color(0xFF2196F3).withOpacity(0.3)),
          const SizedBox(height: 8.0),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Text('Gerbong:', style: GoogleFonts.inter(fontSize: 12.0)),
              Text(
                widget.gerbongFaseData.nomorGerbong,
                style: GoogleFonts.inter(
                  fontSize: 12.0,
                  fontWeight: FontWeight.w700,
                ),
              ),
            ],
          ),
          const SizedBox(height: 4.0),
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              Text('Fase:', style: GoogleFonts.inter(fontSize: 12.0)),
              Text(
                '${widget.gerbongFaseData.faseBerangkat.isNotEmpty ? "Berangkat (B)" : ""} ${widget.gerbongFaseData.faseKembali.isNotEmpty ? "Kembali (K)" : ""}',
                style: GoogleFonts.inter(
                  fontSize: 12.0,
                  fontWeight: FontWeight.w700,
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }

  Widget _buildKategoriSection(ChecksheetKategoriModel kategori) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        // Header kategori
        Container(
          width: double.infinity,
          margin: const EdgeInsets.only(top: 16.0, bottom: 8.0),
          padding: const EdgeInsets.all(12.0),
          decoration: BoxDecoration(
            color: const Color(0xFF2196F3).withOpacity(0.1),
            borderRadius: BorderRadius.circular(8.0),
            border: Border.all(color: const Color(0xFF2196F3), width: 1.5),
          ),
          child: Text(
            kategori.namaKategori,
            style: GoogleFonts.plusJakartaSans(
              fontSize: 14.0,
              fontWeight: FontWeight.w700,
              color: const Color(0xFF2196F3),
            ),
          ),
        ),

        // Items dalam kategori
        ...kategori.items.map((item) {
          return _buildKomponenItem(item);
        }).toList(),
      ],
    );
  }

  Widget _buildKomponenItem(ChecksheetKomponenModel item) {
    final selectedChoice = item.hasilInput.toUpperCase();

    return Container(
      margin: const EdgeInsets.only(bottom: 12.0),
      padding: const EdgeInsets.all(16.0),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(8.0),
        border: Border.all(
          color:
              item.hasilInput.isEmpty
                  ? Colors.grey.shade300
                  : const Color(0xFF2196F3),
          width: 1.0,
        ),
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            item.itemPemeriksaan,
            style: GoogleFonts.plusJakartaSans(
              fontSize: 14.0,
              fontWeight: FontWeight.w600,
              color: Colors.black,
            ),
          ),
          const SizedBox(height: 12.0),

          // Standar
          Container(
            width: double.infinity,
            padding: const EdgeInsets.symmetric(
              horizontal: 12.0,
              vertical: 10.0,
            ),
            decoration: BoxDecoration(
              color: const Color(0xFFE3F2FD),
              borderRadius: BorderRadius.circular(6.0),
              border: Border(
                bottom: BorderSide(color: const Color(0xFF2196F3), width: 2.0),
              ),
            ),
            child: Row(
              children: [
                Text(
                  'Standar:',
                  style: GoogleFonts.inter(
                    fontSize: 12.0,
                    fontWeight: FontWeight.w600,
                    color: const Color(0xFF2196F3),
                  ),
                ),
                const Spacer(),
                Text(
                  item.standar,
                  style: GoogleFonts.inter(
                    fontSize: 12.0,
                    fontWeight: FontWeight.w700,
                    color: const Color(0xFF2196F3),
                  ),
                ),
              ],
            ),
          ),

          const SizedBox(height: 12.0),

          // Tombol Baik / Rusak
          Row(
            children: [
              Expanded(
                child: _buildKondisiButton(
                  label: 'Baik',
                  isSelected: selectedChoice == 'BAIK',
                  onTap: () {
                    setState(() {
                      item.hasilInput = 'BAIK';
                    });
                  },
                ),
              ),
              const SizedBox(width: 12.0),
              Expanded(
                child: _buildKondisiButton(
                  label: 'Rusak',
                  isSelected: selectedChoice == 'RUSAK',
                  onTap: () {
                    setState(() {
                      item.hasilInput = 'RUSAK';
                    });
                  },
                ),
              ),
            ],
          ),

          const SizedBox(height: 12.0),

          // Keterangan
          TextField(
            controller: TextEditingController(text: item.keterangan)
              ..selection = TextSelection.fromPosition(
                TextPosition(offset: item.keterangan.length),
              ),
            decoration: InputDecoration(
              hintText: 'Keterangan/Tindak Lanjut (Opsional)',
              hintStyle: GoogleFonts.inter(
                fontSize: 12.0,
                color: Colors.grey[400],
              ),
              contentPadding: const EdgeInsets.symmetric(
                horizontal: 12.0,
                vertical: 12.0,
              ),
              filled: true,
              fillColor: Colors.grey.shade50,
              border: OutlineInputBorder(
                borderRadius: BorderRadius.circular(8.0),
                borderSide: BorderSide(color: Colors.grey.shade300),
              ),
              enabledBorder: OutlineInputBorder(
                borderRadius: BorderRadius.circular(8.0),
                borderSide: BorderSide(color: Colors.grey.shade300),
              ),
              focusedBorder: OutlineInputBorder(
                borderRadius: BorderRadius.circular(8.0),
                borderSide: const BorderSide(
                  color: Color(0xFF2196F3),
                  width: 1.5,
                ),
              ),
            ),
            style: GoogleFonts.inter(fontSize: 13.0, color: Colors.black87),
            maxLines: 3,
            minLines: 1,
            onChanged: (value) {
              setState(() {
                item.keterangan = value;
              });
            },
          ),
        ],
      ),
    );
  }

  Widget _buildKondisiButton({
    required String label,
    required bool isSelected,
    required VoidCallback onTap,
  }) {
    return InkWell(
      onTap: onTap,
      borderRadius: BorderRadius.circular(8.0),
      child: Container(
        padding: const EdgeInsets.symmetric(vertical: 14.0),
        decoration: BoxDecoration(
          color: isSelected ? const Color(0xFF2196F3) : Colors.white,
          borderRadius: BorderRadius.circular(8.0),
          border: Border.all(
            color: isSelected ? const Color(0xFF2196F3) : Colors.grey.shade300,
            width: isSelected ? 2.0 : 1.0,
          ),
        ),
        child: Center(
          child: Text(
            label,
            style: GoogleFonts.inter(
              fontSize: 14.0,
              fontWeight: FontWeight.w600,
              color: isSelected ? Colors.white : Colors.grey[700],
            ),
          ),
        ),
      ),
    );
  }

  Widget _buildSimpanButton() {
    return Container(
      width: double.infinity,
      margin: const EdgeInsets.all(16.0),
      child: ElevatedButton(
        onPressed: _isLoading ? null : _handleSimpan,
        style: ElevatedButton.styleFrom(
          backgroundColor: const Color(0xFF2196F3),
          padding: const EdgeInsets.symmetric(vertical: 16.0),
          shape: RoundedRectangleBorder(
            borderRadius: BorderRadius.circular(12.0),
          ),
          elevation: 0,
        ),
        child:
            _isLoading
                ? const SizedBox(
                  height: 20.0,
                  width: 20.0,
                  child: CircularProgressIndicator(
                    color: Colors.white,
                    strokeWidth: 2.0,
                  ),
                )
                : Text(
                  'Simpan Laporan',
                  style: GoogleFonts.plusJakartaSans(
                    fontSize: 16.0,
                    fontWeight: FontWeight.w700,
                    color: Colors.white,
                  ),
                ),
      ),
    );
  }

  void _handleSimpan() async {
    setState(() {
      _isLoading = true;
    });

    // Simulasi proses simpan
    await Future.delayed(const Duration(seconds: 2));

    setState(() {
      _isLoading = false;
    });

    if (!mounted) return;

    // Show success notification
    ScaffoldMessenger.of(context).showSnackBar(
      SnackBar(
        content: Row(
          children: [
            const Icon(Icons.check_circle, color: Colors.white),
            const SizedBox(width: 12.0),
            Expanded(
              child: Text(
                'Laporan berhasil disimpan!',
                style: GoogleFonts.inter(fontWeight: FontWeight.w600),
              ),
            ),
          ],
        ),
        backgroundColor: Colors.green,
        duration: const Duration(seconds: 2),
        behavior: SnackBarBehavior.floating,
      ),
    );

    // Navigate back to GerbongFase page (loop)
    await Future.delayed(const Duration(seconds: 1));

    if (!mounted) return;

    Navigator.pushReplacement(
      context,
      MaterialPageRoute(
        builder:
            (context) => ChecksheetGerbongFasePage(
              user: widget.user,
              jadwal: widget.jadwal,
              laporanId: widget.laporanId,
              sheetType: widget.sheetType,
            ),
      ),
    );
  }

  String _getInitials() {
    if (widget.user.nama == null || widget.user.nama!.isEmpty) {
      return 'M';
    }

    final parts = widget.user.nama!.split(' ');
    if (parts.length >= 2) {
      return '${parts[0][0]}${parts[1][0]}'.toUpperCase();
    } else {
      return widget.user.nama!.substring(0, 1).toUpperCase();
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.grey.shade50,
      body: Column(
        children: [
          _buildCustomHeader(),
          _buildBackButton(),
          Expanded(
            child: ListView(
              controller: _listScrollController,
              padding: const EdgeInsets.only(bottom: 80.0),
              children: [
                _buildInfoSection(),
                Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 16.0),
                  child: Column(
                    children:
                        _kategoriList
                            .map((kategori) => _buildKategoriSection(kategori))
                            .toList(),
                  ),
                ),
                _buildSimpanButton(),
              ],
            ),
          ),
        ],
      ),
      floatingActionButton:
          _showBackToTop
              ? FloatingActionButton(
                onPressed: _scrollToTop,
                backgroundColor: const Color(0xFF2196F3),
                child: const Icon(Icons.arrow_upward, color: Colors.white),
              )
              : null,
    );
  }
}

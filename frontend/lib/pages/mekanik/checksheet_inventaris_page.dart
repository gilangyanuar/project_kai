import 'package:flutter/material.dart';
import 'package:google_fonts/google_fonts.dart';
import '../../models/user_model.dart';
import '../../models/jadwal_model.dart';
import '../../models/checksheet_item_model.dart';
import '../../services/checksheet_service.dart';
import '../common/success_page.dart';
import '../common/error_page.dart';

class ChecksheetInventarisPage extends StatefulWidget {
  final User user;
  final JadwalModel jadwal;
  final int laporanId;

  const ChecksheetInventarisPage({
    Key? key,
    required this.user,
    required this.jadwal,
    required this.laporanId,
  }) : super(key: key);

  @override
  State<ChecksheetInventarisPage> createState() =>
      _ChecksheetInventarisPageState();
}

class _ChecksheetInventarisPageState extends State<ChecksheetInventarisPage> {
  bool _isLoading = false;
  String _currentSheet = 'Tool Box';

  // ✅ List of available sheets
  final List<Map<String, dynamic>> _sheets = [
    {'name': 'Tool Box', 'icon': Icons.construction},
    {'name': 'Tool Kit', 'icon': Icons.build},
    {'name': 'Mekanik', 'icon': Icons.engineering},
    {'name': 'Genset', 'icon': Icons.electrical_services},
    {'name': 'Mekanik 2', 'icon': Icons.settings},
    {'name': 'Elektrik', 'icon': Icons.bolt},
    {'name': 'Gangguan', 'icon': Icons.warning},
  ];

  late List<ChecksheetItemModel> _toolBoxItems;

  @override
  void initState() {
    super.initState();
    _initializeToolBoxItems();
  }

  void _initializeToolBoxItems() {
    _toolBoxItems = [
      ChecksheetItemModel(itemPemeriksaan: '1. Serbaguna(27 Peralat)'),
      ChecksheetItemModel(itemPemeriksaan: '2. Palu'),
      ChecksheetItemModel(itemPemeriksaan: '3. Linggis kecil'),
      ChecksheetItemModel(itemPemeriksaan: '4. Sarang kisi-kisi'),
      ChecksheetItemModel(itemPemeriksaan: '5. V-belt'),
      ChecksheetItemModel(itemPemeriksaan: '6. Jan Pugin'),
      ChecksheetItemModel(itemPemeriksaan: '7. Mesin batok'),
      ChecksheetItemModel(itemPemeriksaan: '8. Kawat'),
      ChecksheetItemModel(itemPemeriksaan: '9. Ring block'),
      ChecksheetItemModel(itemPemeriksaan: '10. Kain lap'),
      ChecksheetItemModel(itemPemeriksaan: '11. Bandara putih'),
      ChecksheetItemModel(itemPemeriksaan: '12. Bandara merah'),
      ChecksheetItemModel(itemPemeriksaan: '13. Kabur I motif (NYKR-NYK 3mm)'),
      ChecksheetItemModel(itemPemeriksaan: '14. Lampu LED 3 31'),
      ChecksheetItemModel(itemPemeriksaan: '15. WD-40'),
      ChecksheetItemModel(itemPemeriksaan: '16. Sasang timpan'),
      ChecksheetItemModel(itemPemeriksaan: '17. Kawat'),
    ];
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
      backgroundColor: Colors.white,
      body: Column(
        children: [
          // ✅ Header dengan Logo dan Profile
          _buildCustomHeader(),

          // ✅ Tombol Kembali (Terpisah)
          _buildBackButton(),

          // ✅ Info Laporan Card
          _buildLaporanInfoCard(),

          // ✅ Horizontal Sheet Tabs
          _buildSheetTabs(),

          // ✅ Sheet Name Title
          _buildSheetTitle(),

          // List Items
          Expanded(
            child: ListView.builder(
              padding: const EdgeInsets.symmetric(horizontal: 16.0),
              itemCount: _toolBoxItems.length,
              itemBuilder: (context, index) {
                return _buildChecklistItem(_toolBoxItems[index], index);
              },
            ),
          ),

          // Bottom Button
          _buildBottomButton(),
        ],
      ),
    );
  }

  //Custom Header dengan Logo dan Profile
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
              // Logo KAI
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

              // Profile Avatar
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

  // Tombol "Kembali ke Dashboard"
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
              Icon(
                Icons.arrow_back,
                color: const Color(0xFF2196F3),
                size: 20.0,
              ),
              const SizedBox(width: 8.0),
              Text(
                'Kembali ke Dashboard',
                style: GoogleFonts.plusJakartaSans(
                  fontSize: 15.0,
                  fontWeight: FontWeight.w700,
                  color: const Color(0xFF2196F3),
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }

  //Info Laporan Card
  Widget _buildLaporanInfoCard() {
    return Container(
      width: double.infinity,
      margin: const EdgeInsets.all(16.0),
      padding: const EdgeInsets.all(16.0),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(12.0),
        border: Border.all(color: Colors.grey.shade200),
        boxShadow: [
          BoxShadow(
            color: Colors.black.withOpacity(0.05),
            blurRadius: 10.0,
            offset: const Offset(0, 2),
          ),
        ],
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Row(
            mainAxisAlignment: MainAxisAlignment.spaceBetween,
            children: [
              // Nama KA
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      '${widget.jadwal.noKa} - ${widget.jadwal.namaKa}',
                      style: GoogleFonts.plusJakartaSans(
                        fontSize: 16.0,
                        fontWeight: FontWeight.w700,
                        color: Colors.black,
                      ),
                    ),
                    const SizedBox(height: 4.0),
                    // Rich Text dengan warna berbeda
                    RichText(
                      text: TextSpan(
                        style: GoogleFonts.inter(
                          fontSize: 12.0,
                          color: Colors.grey[600],
                          fontWeight: FontWeight.w500,
                        ),
                        children: [
                          TextSpan(
                            text: 'GMR-SMT',
                            style: TextStyle(
                              color: const Color(0xFF2196F3),
                              fontWeight: FontWeight.w700,
                            ),
                          ),
                          TextSpan(text: ' | ID: #${widget.laporanId}'),
                        ],
                      ),
                    ),
                  ],
                ),
              ),

              // Status Badge
              Container(
                padding: const EdgeInsets.symmetric(
                  horizontal: 12.0,
                  vertical: 6.0,
                ),
                decoration: BoxDecoration(
                  color: Colors.blue.shade50,
                  borderRadius: BorderRadius.circular(20.0),
                  border: Border.all(color: Colors.blue.shade200),
                ),
                child: Row(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Icon(
                      Icons.edit_note,
                      size: 16.0,
                      color: Colors.blue.shade700,
                    ),
                    const SizedBox(width: 4.0),
                    Text(
                      'Draft',
                      style: GoogleFonts.inter(
                        fontSize: 12.0,
                        fontWeight: FontWeight.w600,
                        color: Colors.blue.shade700,
                      ),
                    ),
                  ],
                ),
              ),
            ],
          ),
          const SizedBox(height: 12.0),
          Divider(color: Colors.grey.shade200, height: 1.0),
          const SizedBox(height: 12.0),

          // Info tambahan
          Row(
            children: [
              Icon(Icons.access_time, size: 14.0, color: Colors.grey[600]),
              const SizedBox(width: 6.0),
              Text(
                'Berangkat: ${widget.jadwal.jamBerangkat}',
                style: GoogleFonts.inter(
                  fontSize: 12.0,
                  color: Colors.grey[600],
                ),
              ),
            ],
          ),
        ],
      ),
    );
  }

  // ✅ 3. Horizontal Sheet Tabs (Draggable)
  Widget _buildSheetTabs() {
    return Container(
      height: 70.0, // ✅ Tinggi yang cukup
      margin: const EdgeInsets.only(bottom: 12.0),
      child: ListView.builder(
        scrollDirection: Axis.horizontal,
        padding: const EdgeInsets.symmetric(horizontal: 16.0),
        itemCount: _sheets.length,
        itemBuilder: (context, index) {
          final sheet = _sheets[index];
          final isSelected = _currentSheet == sheet['name'];

          return GestureDetector(
            onTap: () {
              setState(() {
                _currentSheet = sheet['name'];
              });
            },
            child: Container(
              margin: const EdgeInsets.only(right: 12.0),
              padding: const EdgeInsets.symmetric(
                horizontal: 16.0,
                vertical: 8.0,
              ),
              constraints: const BoxConstraints(
                minWidth: 80.0, // ✅ Lebar minimum
                maxWidth: 120.0, // ✅ Lebar maksimum
              ),
              decoration: BoxDecoration(
                color: isSelected ? const Color(0xFF2196F3) : Colors.white,
                borderRadius: BorderRadius.circular(12.0),
                border: Border.all(
                  color:
                      isSelected
                          ? const Color(0xFF2196F3)
                          : Colors.grey.shade300,
                  width: isSelected ? 2.0 : 1.0,
                ),
                boxShadow:
                    isSelected
                        ? [
                          BoxShadow(
                            color: const Color(0xFF2196F3).withOpacity(0.3),
                            blurRadius: 8.0,
                            offset: const Offset(0, 2),
                          ),
                        ]
                        : null,
              ),
              child: Column(
                mainAxisSize: MainAxisSize.min, // ✅ Penting
                mainAxisAlignment: MainAxisAlignment.center,
                children: [
                  Icon(
                    sheet['icon'],
                    size: 22.0,
                    color: isSelected ? Colors.white : Colors.grey[700],
                  ),
                  const SizedBox(height: 4.0),
                  Text(
                    sheet['name'],
                    style: GoogleFonts.inter(
                      fontSize: 11.0,
                      fontWeight:
                          isSelected ? FontWeight.w700 : FontWeight.w600,
                      color: isSelected ? Colors.white : Colors.grey[700],
                    ),
                    textAlign: TextAlign.center,
                    maxLines: 1, // ✅ Batasi 1 baris
                    overflow:
                        TextOverflow.ellipsis, // ✅ Potong jika terlalu panjang
                  ),
                ],
              ),
            ),
          );
        },
      ),
    );
  }

  // ✅ 4. Sheet Title
  Widget _buildSheetTitle() {
    return Padding(
      padding: const EdgeInsets.symmetric(horizontal: 16.0, vertical: 8.0),
      child: Row(
        children: [
          Text(
            'Tool Box Checksheet (Inventaris)',
            style: GoogleFonts.plusJakartaSans(
              fontSize: 16.0,
              fontWeight: FontWeight.w700,
              color: Colors.black,
            ),
          ),
          const Spacer(),
          // Progress indicator
          Text(
            '${_toolBoxItems.where((item) => item.hasilInput.isNotEmpty).length}/${_toolBoxItems.length}',
            style: GoogleFonts.inter(
              fontSize: 14.0,
              fontWeight: FontWeight.w600,
              color: Colors.grey[600],
            ),
          ),
        ],
      ),
    );
  }

  Widget _buildChecklistItem(ChecksheetItemModel item, int index) {
    return Container(
      margin: const EdgeInsets.only(bottom: 16.0),
      padding: const EdgeInsets.all(16.0),
      decoration: BoxDecoration(
        color: Colors.white,
        borderRadius: BorderRadius.circular(12.0),
        border: Border.all(
          color:
              item.hasilInput.isEmpty
                  ? Colors.grey.shade300
                  : const Color(0xFF2196F3),
          width: item.hasilInput.isEmpty ? 1.0 : 2.0,
        ),
        boxShadow: [
          BoxShadow(
            color: Colors.black.withOpacity(0.03),
            blurRadius: 8.0,
            offset: const Offset(0, 2),
          ),
        ],
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.start,
        children: [
          Text(
            item.itemPemeriksaan,
            style: GoogleFonts.plusJakartaSans(
              fontSize: 14.0,
              fontWeight: FontWeight.w700,
              color: Colors.black,
            ),
          ),
          const SizedBox(height: 12.0),

          Row(
            children: [
              _buildRadioButton(item, 'Baik', const Color(0xFF4CAF50)),
              const SizedBox(width: 12.0),
              _buildRadioButton(item, 'Rusak', const Color(0xFFFFC107)),
              const SizedBox(width: 12.0),
              _buildRadioButton(item, 'Tiada ada', const Color(0xFFF44336)),
            ],
          ),

          if (item.hasilInput.isNotEmpty) ...[
            const SizedBox(height: 12.0),
            TextField(
              decoration: InputDecoration(
                hintText: 'Keterangan (opsional)',
                hintStyle: GoogleFonts.inter(
                  fontSize: 13.0,
                  color: Colors.grey[400],
                ),
                contentPadding: const EdgeInsets.symmetric(
                  horizontal: 12.0,
                  vertical: 10.0,
                ),
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
                  borderSide: const BorderSide(color: Color(0xFF2196F3)),
                ),
              ),
              style: GoogleFonts.inter(fontSize: 13.0),
              maxLines: 2,
              onChanged: (value) {
                item.keterangan = value;
              },
            ),
          ],
        ],
      ),
    );
  }

  Widget _buildRadioButton(
    ChecksheetItemModel item,
    String label,
    Color color,
  ) {
    final isSelected = item.hasilInput.toUpperCase() == label.toUpperCase();

    return Expanded(
      child: InkWell(
        onTap: () {
          setState(() {
            item.hasilInput = label.toUpperCase();
          });
        },
        borderRadius: BorderRadius.circular(8.0),
        child: Container(
          padding: const EdgeInsets.symmetric(vertical: 10.0),
          decoration: BoxDecoration(
            color: isSelected ? color.withOpacity(0.1) : Colors.white,
            borderRadius: BorderRadius.circular(8.0),
            border: Border.all(
              color: isSelected ? color : Colors.grey.shade300,
              width: isSelected ? 2.0 : 1.0,
            ),
          ),
          child: Row(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              Container(
                width: 18.0,
                height: 18.0,
                decoration: BoxDecoration(
                  shape: BoxShape.circle,
                  border: Border.all(
                    color: isSelected ? color : Colors.grey.shade400,
                    width: 2.0,
                  ),
                  color: isSelected ? color : Colors.transparent,
                ),
                child:
                    isSelected
                        ? const Icon(
                          Icons.check,
                          size: 12.0,
                          color: Colors.white,
                        )
                        : null,
              ),
              const SizedBox(width: 6.0),
              Flexible(
                child: Text(
                  label,
                  style: GoogleFonts.inter(
                    fontSize: 12.0,
                    fontWeight: isSelected ? FontWeight.w700 : FontWeight.w600,
                    color: isSelected ? color : Colors.grey[700],
                  ),
                  textAlign: TextAlign.center,
                  overflow: TextOverflow.ellipsis,
                ),
              ),
            ],
          ),
        ),
      ),
    );
  }

  Widget _buildBottomButton() {
    final allFilled = _toolBoxItems.every((item) => item.hasilInput.isNotEmpty);

    return Container(
      padding: const EdgeInsets.all(16.0),
      decoration: BoxDecoration(
        color: Colors.white,
        boxShadow: [
          BoxShadow(
            color: Colors.black.withOpacity(0.05),
            blurRadius: 10.0,
            offset: const Offset(0, -2),
          ),
        ],
      ),
      child: SafeArea(
        child: SizedBox(
          width: double.infinity,
          child: ElevatedButton(
            onPressed: allFilled && !_isLoading ? _handleSimpan : null,
            style: ElevatedButton.styleFrom(
              backgroundColor: const Color(0xFF2196F3),
              foregroundColor: Colors.white,
              disabledBackgroundColor: Colors.grey.shade300,
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
                        strokeWidth: 2.0,
                        valueColor: AlwaysStoppedAnimation<Color>(Colors.white),
                      ),
                    )
                    : Text(
                      'Simpan Tool Box',
                      style: GoogleFonts.plusJakartaSans(
                        fontSize: 16.0,
                        fontWeight: FontWeight.w700,
                      ),
                    ),
          ),
        ),
      ),
    );
  }

  void _handleSimpan() async {
    setState(() {
      _isLoading = true;
    });

    try {
      final result = await ChecksheetService.simpanDataInventarisSimulasi(
        laporanId: widget.laporanId,
        token: widget.user.token ?? '',
        namaSheet: _currentSheet,
        items: _toolBoxItems,
      );

      setState(() {
        _isLoading = false;
      });

      if (mounted) {
        Navigator.pushReplacement(
          context,
          MaterialPageRoute(
            builder:
                (context) => SuccessPage(
                  message: result['message'] ?? 'Data berhasil disimpan',
                  onBackPressed: () {
                    Navigator.pop(context);
                    Navigator.pop(context);
                  },
                ),
          ),
        );
      }
    } catch (e) {
      setState(() {
        _isLoading = false;
      });

      if (mounted) {
        Navigator.push(
          context,
          MaterialPageRoute(
            builder:
                (context) => ErrorPage(
                  message: e.toString().replaceAll('Exception: ', ''),
                  onBackPressed: () {
                    Navigator.pop(context);
                  },
                ),
          ),
        );
      }
    }
  }
}

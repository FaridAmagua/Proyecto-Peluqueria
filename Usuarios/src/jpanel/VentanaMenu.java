package jpanel;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JButton;
import javax.swing.JLabel;
import javax.swing.ImageIcon;
import java.awt.Color;
import javax.swing.border.MatteBorder;



import javax.swing.border.BevelBorder;
import javax.swing.border.LineBorder;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.awt.Dialog.ModalExclusionType;

public class VentanaMenu extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					VentanaMenu frame = new VentanaMenu();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public VentanaMenu() {
		setModalExclusionType(ModalExclusionType.APPLICATION_EXCLUDE);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 636, 658);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(0, 255, 0));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		this.setLocationRelativeTo(null);

	
		
		JPanel panel_Registrar = new JPanel();
		panel_Registrar.setBounds(218, 292, 196, 55);
		panel_Registrar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent evt) {
				VentanaRegistro a = new VentanaRegistro();
				a.setVisible(true);
			
		
			}

			
		});
		contentPane.setLayout(null);
		
		JLabel lblNewLabel = new JLabel("");
		lblNewLabel.setIcon(new ImageIcon("C:\\Users\\farid\\OneDrive\\Documentos\\Proyecto\\Imagenes\\Menu.png"));
		lblNewLabel.setBounds(0, 0, 620, 619);
		contentPane.add(lblNewLabel);
		
		JLabel lblNewLabel_6 = new JLabel("New label");
		lblNewLabel_6.setBounds(-25, 0, 248, 125);
		lblNewLabel_6.setIcon(new ImageIcon("C:\\Users\\farid\\Downloads\\Recursos app\\rfservices.png"));
		contentPane.add(lblNewLabel_6);
		panel_Registrar.setBorder(new LineBorder(new Color(0, 0, 0), 2));
		panel_Registrar.setBackground(new Color(207, 9, 9));
		contentPane.add(panel_Registrar);
		
		JPanel panel_Eliminar = new JPanel();
		panel_Eliminar.setBounds(218, 477, 196, 55);
		panel_Eliminar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				EliminarCita a1 = new EliminarCita();
				a1.setVisible(true);
			}
		});
		panel_Eliminar.setBorder(new LineBorder(new Color(0, 0, 0), 2));
		panel_Eliminar.setBackground(new Color(207, 9, 9));
		contentPane.add(panel_Eliminar);
		
		JPanel panel_Consultar = new JPanel();
		panel_Consultar.setBounds(218, 346, 196, 50);
		panel_Consultar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				VentanaCitasActivas a = new VentanaCitasActivas();
				a.setVisible(true);
				
				
			}
		});
		panel_Consultar.setBorder(new LineBorder(new Color(0, 0, 0), 2));
		panel_Consultar.setBackground(new Color(207, 9, 9));
		contentPane.add(panel_Consultar);

		
		JPanel panel_Salir = new JPanel();
		panel_Salir.setBounds(218, 531, 196, 55);
		panel_Salir.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
				System.exit(0);
			}
		});
		panel_Salir.setBorder(new LineBorder(new Color(0, 0, 0), 2));
		panel_Salir.setBackground(new Color(207, 9, 9));
		contentPane.add(panel_Salir);
		
		JPanel panel_Modicar = new JPanel();
		panel_Modicar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
			 VentanaModificar a1= new VentanaModificar();
			 a1.setVisible(true);
			
			}
		});
		panel_Modicar.setBounds(218, 394, 196, 44);
		contentPane.add(panel_Modicar);
		
		JPanel panel_Reservar = new JPanel();
		panel_Reservar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent e) {
			VentanReservar a1 = new VentanReservar();
			a1.setVisible(true);
			}
		});
		panel_Reservar.setBounds(218, 440, 196, 36);
		contentPane.add(panel_Reservar);
	}
}
